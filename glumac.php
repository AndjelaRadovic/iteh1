<?php
include('layout.php');
include('model/glumacKlasa.php');
include('dbBroker.php');


?>

<script type = "text/javascript" src="js/glumac.js"></script>



<div class="container">
    <table id="glumac-table" class="table table-hover">
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
                Broj godina
            </th>
            <th>
                Država porekla
            </th>
            <th>
               Opcije
            </th>

       
        </tr>
        </thead>

        
        <tbody><?php
        $glumci = Glumac::getAll();
        if(count($glumci) == 0){
            echo "<h3>Ne postoje podaci o glumcima!</h3>";
        }
        else{
            foreach ($glumci as $glumac){
                echo "<tr>
        <td>".$glumac->id."</td>
        <td>".$glumac->ime."</td>
        <td>".$glumac->prezime."</td>
        <td>".$glumac->godine."</td>
        <td>".$glumac->drzava_porekla."</td>

        <td>
        <ul class='list-inline m-0'>
        <li class='list-inline-item'>
            <button id='edit_glumac' name='edit_glumac' onclick='izmeniGlumca($glumac->id)' class='btn btn-primary btn-sm rounded-0' type='button' data-toggle='tooltip' data-placement='top' title='Izmeni'>Izmeni</button>
        </li>
        <li class='list-inline-item'>
            <button id='delete_glumac' name='delete_glumac' onclick='obrisiGlumca($glumac->id)' class='btn btn-success btn-sm rounded-0' type='button' data-toggle='tooltip' data-placement='top' title='Obriši'>Obriši</button>
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
<div id="glumac-edit">

</div>
