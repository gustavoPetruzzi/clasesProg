$(document).ready(function() {
    $.ajax({
            url: 'php/mostrar.php',
            type: 'GET',
            dataType: 'json'
        })
        .done(function(data) {
            
            var lineas = "";
            var count= 0;
            for (var element in data) {
                var empleado = data[element];
                var src = "fotos/" + empleado.foto;
                if(count == 0)
                {
                    var fila = document.createElement('div');
                    fila.className = "col-md-4";
                    fila.style = "background-color: lightgrey"
                } 
                lineas += "<img class=\"img-circle\" style=\"background-color: lightgrey\"src =\"" + src + "\" width='250px' height='200px'/>";
                lineas += "<h3>" + empleado.nombre + " " + empleado.apellido + "</h3>";
                lineas += "<p>"+"Dni: " + empleado.dni + "</p>";
                lineas += "<p>"+"Sexo: " + empleado.sexo + "</p>";
                lineas += "<p>"+"Legajo: " + empleado.legajo + "</p>";
                lineas += "<p>"+"Sueldo: $" + empleado.sueldo + "</p>";
                fila.innerHTML = lineas;
                $("#principal").append(fila);
                count++;
                if(count == 4)
                {
                    count = 0;
                }
            }

        })
        .fail(function(peticion, textStatus, errorThrown) {
            alert(peticion.status + " " + errorThrown)
        });
});