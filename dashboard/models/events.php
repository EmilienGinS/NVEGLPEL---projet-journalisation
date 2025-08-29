<?php
class events extends Model {
    var $table = "SystemEvents";

    // Pour éviter colonne inconnue, on ordonne par id desc
    function getLast($num = 10, $F = "16,17,18,19,20,21,22,23", $P = "3,6") {

        
        return $this->find([
            "order" => "id DESC",
            "condition" => "Facility IN ($F) AND Priority IN ($P)",
            "limit" => "LIMIT ".intval($num),
        ]);
    }
}