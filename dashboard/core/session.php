<?php
class Session
{
    //ouverture de la variable de session
    function __construct(){
        if (!isset($_SESSION)) {
            session_start();

        }
    }

    ////initiation d'une variable de session
    //function write($key, $value){
    //    $_SESSION[$key] = $value;
    //}

    ////lecture d'une variable de session
    //function read($key=null)
    //{
    //    if ($key){
    //        if (isset($_SESSION[$key])){
    //            return $_SESSION[$key];
    //        } else {
    //            return false;
    //        }
    //    } else {
    //        return $_SESSION;
    //    }
    //}

    ////méthode pour affecter un message 
    //public function setFlash($message, $icon="", $type="success"){
    //    $_SESSION['flash'] = array (
    //        'message'=>$message,
    //        'icon'=>$icon,
    //        'type'=>$type
    //    );
    //}

    ////méthode pour afficher un message
    //public function flash(){
    //    if (isset($_SESSION['flash']['message'])){
    //        $html = '<div class="alert alert-'.$_SESSION['flash']['type'].' d-flex align-items-center" role="alert">';
    //        $html .= $_SESSION['flash']['icon'];
    //        $html .= '<div>';
    //        $html .= $_SESSION['flash']['message'];
    //        $html .= '</div>';
    //        $html .= '</div>';
    //        $_SESSION['flash'] = array();
    //        return $html;
    //    }
    //}

    ////retourne vrai si le nom de la personnne logué existe
    //public function isLogged(){
    //    return isset($_SESSION['User']->username);
    //}

    ////methode pour lire la valeur de user
    //public function user($key){
    //    if ($this->read('User')->$key){
    //        return $this->read('User')->$key;
    //    } else {
    //        return false;
    //    }
    //}

}
