<?php
class Model {
    public $id;
    public $table;
    public $conf = "default";
    public $db;

    function __construct() {
        $conf = conf::$databases[$this->conf];
        $dsn = 'mysql:host='.$conf['host'].';dbname='.$conf['database'].';charset=utf8mb4';
        try {
            $this->db = new PDO(
                $dsn,
                $conf['login'],
                $conf['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
                ]
            );
        } catch (PDOException $e) {
            die("Erreur PDO : ".$e->getMessage());
        }
    }


    //read : un select sur la clé primaire
    function read($fields = NULL)
    {

        if ($fields == NULL) {
            $fields = '*';
        }
        $sql = "SELECT " . $fields . " FROM " . $this->table . " WHERE id=:id";
        echo "<p class='alert alert-info'' role='alert''>" . $sql . "</p>";
        $sth = $this->db->prepare($sql);
        if ($sth->execute(array(':id' => $this->id))) {
            $data = $sth->fetch(PDO::FETCH_OBJ);
            //echo "<PRE>";
            //print_r($data);
            //echo "</PRE>";
            foreach ($data as $key => $value) {
                //On peut ainsi créer à la volée les propriétés de la classe
                $this->$key = $value;
            }
        } else {
            echo "<br> Erreur SQL <br>";
        }
    }

    function delete()
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id=:id";
        $sth = $this->db->prepare($sql);
        //echo $sql;
        if ($sth->execute(array(':id' => $this->id))) {
            return true;
        } else {
            echo "<p class='alert alert-success m-lg-5' role='alert'><span>Error /!\ :</span> Erreur SQL!</p>";
        }
    }

    function find($data)
    {

        $fields = '*';
        $condition = "1=1";
        $order = "id";
        $limit = " ";
        $join = " ";

        if (isset($data["fields"])) {
            $fields = $data["fields"];
        }
        if (isset($data["condition"])) {
            $condition = $data["condition"];
        }
        if (isset($data["order"])) {
            $order = $data["order"];
        }
        if (isset($data["limit"])) {
            $limit = $data["limit"];
        }
        if (isset($data["join"])){
            $join = $data["join"];
        }


        $sql = "SELECT " . $fields . " FROM " . $this->table . $join . " WHERE " . $condition . " ORDER BY " . $order . " " . $limit;
        //echo($sql);
        $sth = $this->db->prepare($sql);
        // echo $sql;
        if ($sth->execute()) {
            $data = $sth->fetchAll(PDO::FETCH_OBJ);

            return $data;
        } else {
            echo "<p class='alert alert-success m-lg-5' role='alert'><span>Error /!\ :</span> Erreur SQL!</p>";
        }
    }


    function findFirst($data){
        //retourne l'élément courant du tableau
        //print_r($data)
        return current($this->find($data));
    }


    function save($data)
    {
        if (empty($data["id"])) {
            unset($data["id"]);
            //si id vide, on fait un insert
            $sql = "INSERT INTO " . $this->table . " (";
            $values = "";
            foreach ($data as $key => $value) {
                //le nom des champs
                $sql .= $key . ",";
                $values .= ":" . $key . ",";
            }
            //enlève la dernière virgule
            $sql = substr($sql, 0, -1);
            $values = substr($values, 0, -1);
            $sql .= ") VALUES (" . $values . ");";


            $sth = $this->db->prepare($sql);
            //echo $sql;
            if ($sth->execute($data)) {
                $this->id = $this->db->lastinsertId();
            }

        } else {
            //on fait un update
            $this->id = $data["id"];
            unset($data["id"]);
            $sql = "UPDATE " . $this->table . " SET ";

            foreach ($data as $key => $value) {
                //le nom des champs
                $sql .= " " . $key . " = :" . $key . ",";
            }
            //enlève la dernière virgule
            $sql = substr($sql, 0, -1);
            $sql .= " WHERE id=" . $this->id;
            //echo $sql;
            $sth = $this->db->prepare($sql);
            if (!($sth->execute($data))) {
                echo "<p class='alert alert-success m-lg-5' role='alert'><span>Error /!\ :</span> Erreur SQL!</p>";
            }
        }
    }
}

?>
