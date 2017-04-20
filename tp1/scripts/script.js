window.onload = function() {
    var agregarEmpleado = document.getElementById('agregar');
    /*
    agregarEmpleado.addEventListener('click', function() {
        var req = new XMLHttpRequest();
        req.open('POST', "../agregarEmpleado.php", true);
        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                var div = document.getElementById('respuesta');
                var respuesta = document.createElement('h1');
                respuesta.appendChild(document.createTextNode(req.responseText));
                div.appendChild(respuesta);
                alert(req.responseText);
            } else
                document.getElementById('respuesta').innerHTML = req.responseText;
        }
        req.send();
    });
    */
    /*
    var mostrarEmpleado = document.getElementById('mostrarBoton');
    mostrarEmpleado.addEventListener('click', function() {

        var request = new XMLHttpRequest();
        request.open('GET', "../../mostrar.php", true);
        request.onreadystatechange = function() {
            alert('Hola');
            if (request.onreadystatechange == 4 && request.status == 200) {
                var div = document.getElementById('fotos');
                alert(request.responseText);
            } else {
                return "hola";
            }
        }
    })
    */
}