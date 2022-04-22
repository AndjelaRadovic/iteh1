<?php
include ('layout.php');
include ('model/glumacKlasa.php');
include ('model/reziserKlasa.php');
include ('model/filmKlasa.php');

if(isset($_POST['save'])){
    $film = new Film($_POST['naziv'], $_POST['datum_premijere'], $_POST['zanr'], $_POST['id_reziser'],$_POST['id_glavni_glumac']);
    $film->addNew();
    header('Location: film.php');
}
?>


<div class="container">
    <form class="well form-horizontal" action=" " method="post" id="album_form">
        <fieldset>

            <legend>Dodaj novi film</legend>

            <div class="form-group">
            <label class="col-md-4 control-label">Naziv film</label>
                <div class="col-md-4">
                    <input name="naziv" placeholder="Naziv" class="form-control" type="text" required minlength="2">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Datum premijere filma</label>
                <div class="col-md-4">
                    <input name="datum_premijere" placeholder="Datum" class="form-control" type="date" required minlength="4" maxlength="4">
                </div>

            </div>  

            <div class="form-group">
                <label class="col-md-4 control-label">Žanr filma</label>
                <div class="col-md-4">
                    <input name="zanr" placeholder="Žanr" class="form-control" type="text" required minlength="4" maxlength="4">
                </div>

            </div>  

            <div class="form-group">
                <label class="col-md-4 control-label">Izaberi režisera</label>
                <div class="col-md-4 form-inline">
                    <select name="id_reziser" class="form-control right" required onchange="handleSelectReziser(this)">
                        <option value="">Režiser</option>
                        <?php
                        $reziseri = Reziser::getAll();
                        if(count($reziseri) > 0){
                            foreach ($reziseri as $reziser) {
                                echo "<option value=".$reziser->id.">".$reziser->ime." ".$reziser->prezime."</option>";
                            }
                        }
                        else {
                            echo "<option value". " " ."> There are no bands available.</option>";
                        }
                        ?>
                         <script type="text/javascript">
                        function handleSelectReziser(elm) {
                            if(elm.value == "dodajRezisera.php"){
                                window.location = elm.value;
                            }
                        }
                    </script>

                        
                    
                    </select>
                   
                </div>
            </div>



            <div class="form-group">
                <label class="col-md-4 control-label">Izaberi glavnog glumca</label>
                <div class="col-md-4 form-inline">
                    <select name="id_glavni_glumac" class="form-control right" required onchange="handleSelect(this)">
                        <option value="">Glumac</option>
                        <?php
                        $glumci = Glumac::getAll();
                        if(count($glumci) > 0){
                            foreach ($glumci as $glumac) {
                                echo "<option value=".$glumac->id.">".$glumac->ime." ".$glumac->prezime."</option>";
                            }
                        }
                        else {
                            echo "<option value". " " ."> There are no genres available.</option>";
                        }
                        ?>
                         <script type="text/javascript">
                        function handleSelect(elm) {
                            if(elm.value == "dodajGlumca.php"){
                                window.location = elm.value;
                            }
                        }
                    </script> 
                        
                    </select>
                 
                </div>
                <div class="col-md-4 form-inline">
                    <button type="submit" name="save" class="btn btn-primary">Sačuvaj!</button>
                </div>
            </div>  

        </fieldset>
    </form>
</div>
