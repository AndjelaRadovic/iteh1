<?php
include ('model/glumacKlasa.php');

if (isset ($_GET['id'])){
    $id=$_GET['id'];
    $glumac = Glumac::getById($id);
    $glumac->deleteById();
}
