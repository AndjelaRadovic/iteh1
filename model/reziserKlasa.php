<?php
include_once('response.php');

class Reziser
{
    public $id;
    public $ime;
    public $prezime;
    public $broj_filmova;
  


    public function __construct($ime,$prezime,$broj_filmova)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->broj_filmova = $broj_filmova;
        
    }   

    public function addNew()
    {
        include_once('dbBroker.php');
        global $mysqli;
        $query = "INSERT INTO reziser(ime,prezime,broj_filmova) VALUES 
        ('"
            . $mysqli->real_escape_string($this->ime) . "','"
            . $mysqli->real_escape_string($this->prezime) . "','"
            . $mysqli->real_escape_string( $this->broj_filmova) ."
        ')";

            if ($mysqli->query($query)) {
                return true;
            }
            else {
                return false;
            }


    }

    public static function getAll(){
        include_once('dbBroker.php');
        global $mysqli;
        $sql = "SELECT * FROM reziser";

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }

        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $reziser = new Reziser($row->ime,$row->prezime,$row->broj_filmova);
            $reziser->id = $row->id;
            array_push($arrayResult, $reziser);
        }
        return $arrayResult;
    }

    public static function getById($id){    
        include_once ('dbBroker.php');
        global $mysqli;

        $sql = "SELECT * FROM reziser where id=".$id;

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }
        $reziser = null;
        while($row = $result->fetch_object()){
            $reziser = new Reziser($row->ime,$row->prezime,$row->broj_filmova);
            $reziser->id = $row->id;
        }

        return $reziser;
    }

    public function deleteById(){
        include_once ('dbBroker.php');
        global $mysqli;

        $sql = "DELETE FROM reziser WHERE id=".$this->id;

        if ($mysqli->query($sql)) {
            echo json_encode(new Response(1, "Režiser je izbrisan."));
            return true;
        } else {
            echo json_encode(new Response(0, "Režiser je u upotrebi."));
            return false;
        }
    }

    public function edit(){
        include_once('dbBroker.php');
        global $mysqli;
        $query = "UPDATE reziser SET ime = '" . $this->ime . "', prezime = '" . $this->prezime . "', broj_filmova = '" . $this->broj_filmova . "' WHERE id = $this->id";
        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }   



  


}
?>