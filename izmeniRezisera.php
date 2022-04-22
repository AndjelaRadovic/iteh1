<?php
include('model/reziserKlasa.php');

if(isset($_GET['id'])){
    $idReziser = $_GET['id'];
    $reziser = Reziser::getById($idReziser);
    

}


if(isset($_GET['update'])){
    $reziser = Reziser::getById($_GET['id']);
    $reziser->ime = $_GET['ime'];
    $reziser->prezime = $_GET['prezime'];
    $reziser->broj_filmova = $_GET['broj_filmova'];
    
    $reziser->edit();
    header('Location: reziser.php');

}

?>
<div class="container">
    <form class="well form-horizontal" action="izmeniRezisera.php" method="get" id="band_form1">
        <input hidden name="id" value="<?php echo $reziser->id ?>"/>

        <fieldset>

            <legend>Izmeni Režisera</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">Ime</label>
                <div class="col-md-4">
                    <input name="ime" value="<?php echo $reziser->ime; ?>" class="form-control" type="text" required minlength="2">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Prezime</label>
                <div class="col-md-4">
                    <input name="prezime" value="<?php echo $reziser->prezime; ?>" class="form-control" type="text" required minlength="2">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Broj filmova</label>
                <div class="col-md-4">
                    <input name="broj_filmova" value="<?php echo $reziser->broj_filmova; ?>" class="form-control" type="text" required minlength="1">
                </div>
            </div>

            
           

           
            <div class="col-md-4 form-inline">
                <button type="submit" id="update" name="update" class="btn btn-primary">Sačuvaj izmene</button>
            </div>
        </fieldset>
    </form>
</div>