$(document).ready(function () {

    $("#glumac-table").tablesorter();

});

function izmeniGlumca(id) {
    $.ajax({
        type: 'GET',
        url: 'izmeniGlumca.php',
        data: 'id=' + id,
        cache: false,
        success: function (response) {
            $('#container').hide();
            $('#glumac-edit').append(response);
        },
        error: function (error) {
            alert("Error editing song: " + error.status);
        }
    });
}

function obrisiGlumca(id) {
    $.ajax({
        type: 'GET',
        url: 'obrisiGlumca.php',
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
            alert("Error deleting song: " + error.status);
        }
    });
}