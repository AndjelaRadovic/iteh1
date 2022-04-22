<?php
include_once('response.php');

class Glumac
{
    public $id;
    public $ime;
    public $prezime;
    public $godine;
    public $drzava_porekla;


    public function __construct($ime,$prezime,$godine,$drzava_porekla)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->godine = $godine;
        $this->drzava_porekla = $drzava_porekla;
    }   

    public function addNew()
    {
        include_once('dbBroker.php');
        global $mysqli;
        $query = "INSERT INTO glumac(ime,prezime,godine,drzava_porekla) VALUES 
        ('"
            . $mysqli->real_escape_string($this->ime) . "','"
            . $mysqli->real_escape_string($this->prezime) . "','"
            . $mysqli->real_escape_string( $this->godine) . "','"
            . $mysqli->real_escape_string($this->drzava_porekla) . "
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
        $sql = "SELECT * FROM glumac";

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }

        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $glumac = new Glumac($row->ime,$row->prezime,$row->godine,$row->drzava_porekla);
            $glumac->id = $row->id;
            array_push($arrayResult, $glumac);
        }
        return $arrayResult;
    }

    public static function getById($id){    
        include_once ('dbBroker.php');
        global $mysqli;

        $sql = "SELECT * FROM glumac where id=".$id;

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }
        $glumac = null;
        while($row = $result->fetch_object()){
            $glumac = new Glumac($row->ime,$row->prezime,$row->godine,$row->drzava_porekla);
            $glumac->id = $row->id;
        }

        return $glumac;
    }

    public function deleteById(){
        include_once ('dbBroker.php');
        global $mysqli;

        $sql = "DELETE FROM glumac WHERE id=".$this->id;

        if ($mysqli->query($sql)) {
            echo json_encode(new Response(1, "Song deleted."));
            return true;
        } else {
            echo json_encode(new Response(0, "Song is currently being used."));
            return false;
        }
    }

    public function edit(){
        include_once('dbBroker.php');
        global $mysqli;
        $query = "UPDATE glumac SET ime = '" . $this->ime . "', prezime = '" . $this->prezime . "', godine = '" . $this->godine . "', drzava_porekla = '" . $this->drzava_porekla . "' WHERE id = $this->id";
        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }   


}
?>