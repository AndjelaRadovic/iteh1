$(document).ready(function () {

    $("#film-table").tablesorter();

});

function izmeniFilm(id) {
    $.ajax({
        type: 'GET',
        url: 'izmeniFilm.php',
        data: 'id=' + id,
        cache: false,
        success: function (response) {
            $('#container').hide();
            $('#film-edit').append(response);
        },
        error: function (error) {
            alert("Greska prilikom izmene filma: " + error.status);
        }
    });
}

function obrisiFilm(id) {
    $.ajax({
        type: 'GET',
        url: 'obrisiFilm.php',
        data: 'id=' + id,
        dataType: 'json',   
        cache: false,
        success: function (response) {
            if (response.status == 1) {
                location.reload();
            }
            else {
                alert(response.message);
            }
        },
        error: function (error) {
            alert("Greska prilikom brisanja filma: " + error.status);
        }
    });
}

$('#btn-pretraga').click(function () {

    var para = document.querySelector('#myInput');
    console.log(para);
    var style = window.getComputedStyle(para);
    console.log(style);
    if (!(style.display === 'inline-block') || ($('#myInput').css("visibility") ==  "hidden")) {
        console.log('block');
        $('#myInput').show();
        document.querySelector("#myInput").style.visibility = "";
    } else {
       document.querySelector("#myInput").style.visibility = "hidden";
    }
});
