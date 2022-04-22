<?php
include ('model/reziserKlasa.php');

if (isset ($_GET['id'])){
    $id=$_GET['id'];
    $reziser = Reziser::getById($id);
    $reziser->deleteById();
}
