<?php
include('model/glumacKlasa.php');

if(isset($_GET['id'])){
    $idGlumac = $_GET['id'];
    $glumac = Glumac::getById($idGlumac);
    //echo '<script>console.log('.$band->id.')</script>';

}


if(isset($_GET['update'])){
    $glumac = Glumac::getById($_GET['id']);
    $glumac->ime = $_GET['ime'];
    $glumac->prezime = $_GET['prezime'];
    $glumac->godine = $_GET['godine'];
    $glumac->drzava_porekla = $_GET['drzava_porekla'];
    $glumac->edit();
    header('Location: glumac.php');

}

?>
<div class="container">
    <form class="well form-horizontal" action="izmeniGlumca.php" method="get" id="band_form1">
        <input hidden name="id" value="<?php echo $glumac->id ?>"/>

        <fieldset>

            <legend>Izmeni Glumca</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">Ime</label>
                <div class="col-md-4">
                    <input name="ime" value="<?php echo $glumac->ime; ?>" class="form-control" type="text" required minlength="2">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Prezime</label>
                <div class="col-md-4">
                    <input name="prezime" value="<?php echo $glumac->prezime; ?>" class="form-control" type="text" required minlength="2">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Broj godina</label>
                <div class="col-md-4">
                    <input name="godine" value="<?php echo $glumac->godine; ?>" class="form-control" type="text" required minlength="2">
                </div>
            </div>

            
            <div class="form-group">
                <label class="col-md-4 control-label">Država porekla</label>
                <div class="col-md-4">
                    <input name="drzava_porekla" value="<?php echo $glumac->drzava_porekla; ?>" class="form-control" type="text" required minlength="2">
                </div>
            </div>
           

           
            <div class="col-md-4 form-inline">
                <button type="submit" id="update" name="update" class="btn btn-primary">Sačuvaj izmene</button>
            </div>
        </fieldset>
    </form>
</div>