addEventListener('load', inicializarEventos);

function inicializarEventos() {
    var boton = document.getElementById('agregar');
    boton.addEventListener('click', load);
}


function load() {

    var req = new XMLHttpRequest();
    var params = "?nombre=" + document.getElementById('idNombre').value;
    var url = "agregar.php";
    alert(document.getElementById('idNombre').value);
    req.open("GET", url + params, true);

    req.onreadystatechange = function recibir() {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('miDiv').innerHTML = req.responseText;

        } else
            document.getElementById('miDiv').innerHTML = "Cargando";
    }

    req.send();
}