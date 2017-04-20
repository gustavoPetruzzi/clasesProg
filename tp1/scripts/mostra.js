$(document).ready(function() {
    $.ajax({
            url: 'php/mostrar.php',
            type: 'GET',
            dataType: 'json'
        })
        .done(function(data) {
            var lineas = "";

            for (var element in data) {
                var empleado = data[element];
                var src = "fotos/" + empleado.foto;
                lineas = "<tr> <td>" + empleado.apellido + "</td>";
                lineas += "<td>" + empleado.dni + "</td>";
                lineas += "<td>" + "<img src =\"" + src + "\" width='150px' height='100px'/>";
                lineas += "<td>" + "Aca van los botones" + "</td></tr>";
                $("#empleados").find('tbody')
                    .append(lineas);
            }

        })
        .fail(function(peticion, textStatus, errorThrown) {
            alert(peticion.status + " " + errorThrown)
        });
});