$(document).ready(function() {
    $.ajax({
            url: 'php/mostrar.php',
            type: 'GET',
            dataType: 'json'
        })
        .done(function(data) {
            console.log(data);
            var lineas = "";
            for (var element in data) {
                var empleado = data[element];
                var src = "fotos/" + empleado.foto;
                lineas ="<div class='col-md-4'>";
                lineas += "<img class=\"img-circle\" style=\"background-color: lightgrey\"src =\"" + src + "\" width='250px' height='200px'/>";
                lineas += "<h3>" + empleado.nombre + " " + empleado.apellido + "</h3>";
                lineas += "<p>"+"Dni: " + empleado.dni + "</p>";
                lineas += "<p>"+"Sexo: " + empleado.sexo + "</p>";
                lineas += "<p>"+"Legajo: " + empleado.legajo + "</p>";
                lineas += "<p>"+"Sueldo: $" + empleado.sueldo + "</p>";
                lineas += "</div>";
                $("#principal").append(lineas);    
            }

        })
        .fail(function(peticion, textStatus, errorThrown) {
            alert(peticion.status + " " + errorThrown)
        });
});