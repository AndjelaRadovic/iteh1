<?php
    include('layout.php');
    include('model/reziserKlasa.php');

    if (isset($_POST["save"])) {
        $reziser = new Reziser($_POST['ime'],$_POST['prezime'],$_POST['broj_filmova']);
        $reziser->addNew();
        header('Location: reziser.php');
    }
?>

<div class="container">
    <form class="well form-inline" action=" " method="post" id="genre_form">
        <fieldset>

            <legend>Dodaj novog režisera</legend>

            
            <div class="form-group">
            <label class="col-md-4 control-label">Ime</label>
                <div class="col-md-4">
                    <input name="ime" placeholder="Ime režisera" class="form-control" type="text" required minlength="2">
                </div>
            </div>

                 <div class="form-group">
            <label class="col-md-4 control-label">Prezime</label>
                <div class="col-md-4">
                    <input name="prezime" placeholder="Prezime režisera" class="form-control" type="text" required minlength="2">
                </div>
            </div>
            <div class="form-group">
            <label class="col-md-4 control-label">Filmovi</label>
                <div class="col-md-4">
                    <input name="broj_filmova" placeholder="Broj režiranih filmova" class="form-control" type="text" required minlength="2">
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