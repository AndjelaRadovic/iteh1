<?php
include_once('response.php');

class Film
{
    public $id;
    public $naziv;
    public $datum_premijere;
    public $zanr;
    public $id_reziser;
    public $id_glavni_glumac;


    public function __construct($naziv,$datum_premijere,$zanr,$id_reziser,$id_glavni_glumac)
    {
        $this->naziv = $naziv;
        $this->datum_premijere = $datum_premijere;
        $this->zanr = $zanr;
        $this->id_reziser = $id_reziser;
        $this->id_glavni_glumac = $id_glavni_glumac;
    }   

    public function addNew()
    {
        include_once('dbBroker.php');
        global $mysqli;
        $query = "INSERT INTO film(naziv,datum_premijere,zanr,id_reziser,id_glavni_glumac) VALUES 
        ('"
            . $mysqli->real_escape_string($this->naziv) . "','"
            . $mysqli->real_escape_string($this->datum_premijere) . "','"
            . $mysqli->real_escape_string( $this->zanr) . "','"
            . $mysqli->real_escape_string( $this->id_reziser) . "','"
            . $mysqli->real_escape_string($this->id_glavni_glumac) . "
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
        $sql = "SELECT * FROM film";

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }

        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $film = new Film($row->naziv,$row->datum_premijere,$row->zanr,$row->id_reziser,$row->id_glavni_glumac);
            $film->id = $row->id;
            array_push($arrayResult, $film);
        }
        return $arrayResult;
    }

    public static function getById($id){    
        include_once ('dbBroker.php');
        global $mysqli;

        $sql = "SELECT * FROM film where id=".$id;

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }
        $song = null;
        while($row = $result->fetch_object()){
            $film = new Film($row->naziv,$row->datum_premijere,$row->zanr,$row->id_reziser,$row->id_glavni_glumac);
            $film->id = $row->id;
        }

        return $film;
    }

    public function deleteById(){
        include_once ('dbBroker.php');
        global $mysqli;

        $sql = "DELETE FROM film WHERE id=".$this->id;

        if ($mysqli->query($sql)) {
            echo json_encode(new Response(1, "Film je izbrisan."));
            return true;
        } else {
            echo json_encode(new Response(0, "Film je trenutno u upotrebi."));
            return false;
        }
    }

    public function edit(){
        include_once('dbBroker.php');
        global $mysqli;
        $query = "UPDATE film SET naziv = '" . $this->naziv . "', datum_premijere = '" . $this->datum_premijere . "', zanr = '" . $this->zanr . "', id_reziser = '" . $this->id_reziser . "', id_glavni_glumac = '" . $this->id_glavni_glumac . "' WHERE id = $this->id";
        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }   


}
?>