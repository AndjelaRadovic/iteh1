<?php
include('layout.php');
include('model/reziserKlasa.php');
include('dbBroker.php');


?>

<script type = "text/javascript" src="js/reziser.js"></script>



<div class="container">
    <table id="reziser-table" class="table table-hover">
        <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Ime
            </th>
            <th>
                Prezime
            </th>
            <th>
                Broj filmova
            </th>
            
            <th>
               Opcije
            </th>

       
        </tr>
        </thead>

        
        <tbody><?php
        $reziseri = Reziser::getAll();
        if(count($reziseri) == 0){
            echo "<h3>Ne postoje podaci o reziserima!</h3>";
        }
        else{
            foreach ($reziseri as $reziser){
                echo "<tr>
        <td>".$reziser->id."</td>
        <td>".$reziser->ime."</td>
        <td>".$reziser->prezime."</td>
        <td>".$reziser->broj_filmova."</td>
        

        <td>
        <ul class='list-inline m-0'>
        <li class='list-inline-item'>
            <button id='edit_reziser' name='edit_reziser' onclick='izmeniRezisera($reziser->id)' class='btn btn-primary btn-sm rounded-0' type='button' data-toggle='tooltip' data-placement='top' title='Izmeni'>Izmeni</button>
        </li>
        <li class='list-inline-item'>
            <button id='delete_reziser' name='delete_reziser' onclick='obrisiRezisera($reziser->id)' class='btn btn-success btn-sm rounded-0' type='button' data-toggle='tooltip' data-placement='top' title='Obriši'>Obriši</button>
        </li>
       
    </ul>
    </td>
        
        </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="reziser-edit">

</div>
