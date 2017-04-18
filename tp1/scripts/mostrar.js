window.onload = function() {
    var req = new XMLHttpRequest();
    var url = "php/mostrar.php";
    req.open('GET', url, true);
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {

            var principal = document.getElementById('principal');
            var info = req.responseText;

            // CREAR FUNCION APARTE PARA EXTRAER DATOS
            var lineas = info.split("\n");
            for (var index = 0; index < lineas.length - 1; index++) {

                var div = document.createElement('div');
                div.className = "col-md-4 col-xs-4";
                
                var empleado = lineas[index].split('-');

                var nombre = document.createElement('p');
                nombre.appendChild(document.createTextNode('Nombre:' + empleado[0]));

                var apellido = document.createElement('p');
                apellido.appendChild(document.createTextNode('apellido:' + empleado[1]));

                var dni = document.createElement('p');
                dni.appendChild(document.createTextNode('dni:' + empleado[2]));

                var sexo = document.createElement('p');
                sexo.appendChild(document.createTextNode('sexo:' + empleado[3]));

                var legajo = document.createElement('p');
                legajo.appendChild(document.createTextNode('legajo:' + empleado[4]));

                var sueldo = document.createElement('p');
                sueldo.appendChild(document.createTextNode('sueldo:' + empleado[5]));

                var foto = document.createElement('img');
                foto.className = "img-responsive img-circle";
                var pathFoto = (empleado[6] + "-" + empleado[7]).replace("../", "");
                foto.src = pathFoto;

                div.appendChild(foto);
                div.appendChild(nombre);
                div.appendChild(apellido);
                div.appendChild(dni);
                div.appendChild(sexo);
                div.appendChild(legajo);
                div.appendChild(sueldo);
                
                principal.appendChild(div);
            }

        }
    }
    req.send();
}

function mostrarEmpleados() {

}