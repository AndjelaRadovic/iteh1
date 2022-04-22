<?php
    include('layout.php');
    include('model/glumacKlasa.php');

    if (isset($_POST["save"])) {
        $glumac = new Glumac($_POST['ime'],$_POST['prezime'],$_POST['godine'],$_POST['drzava_porekla']);
        $glumac->addNew();
        header('Location: glumac.php');
    }
?>

<div class="container">
    <form class="well form-inline" action=" " method="post" id="genre_form">
        <fieldset>

            <legend>Dodaj novog glumca</legend>

            
                
            <div class="form-group">
            <label class="col-md-4 control-label">Ime</label>
                <div class="col-md-4">
                    <input name="ime" placeholder="Ime" class="form-control" type="text" required minlength="2">
                </div>
            </div>
            <div class="form-group">
            <label class="col-md-4 control-label">Prezime</label>
                <div class="col-md-4">
                    <input name="prezime" placeholder="Prezime" class="form-control" type="text" required minlength="2">
                </div>
            </div>
                
            <div class="form-group">
            <label class="col-md-4 control-label">Godine</label>
                <div class="col-md-4">
                    <input name="broj_godina" placeholder="Broj godina" class="form-control" type="text" required minlength="2">
                </div>
            </div>
                <div class="form-group">
                <label class="col-md-4 control-label">Država</label>
                <div class="col-md-4">
                    <input name="drzava_porekla" placeholder="Država porekla" class="form-control" type="text" required minlength="1">
                </div>
                </div>
            

            <div class="form-group">
                <div class="col-md-4">
                    <button type="submit" name="save" class="btn btn-primary">Sačuvaj!</button>
                </div>
            </div>

        </fieldset>
    </form>
    </div>