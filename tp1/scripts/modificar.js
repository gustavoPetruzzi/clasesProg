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
                lineas += "<td> <button class='btn btn-warning btn-lg modificar' ";
                lineas += " onclick='modificar(" + empleado.dni +")' >";
                lineas += " <span class='glyphicon glyphicon-alert'></span> Modificar</button>";
                lineas += "<button class='btn btn-danger btn-lg'";
                lineas += " onclick='borrar(" + empleado.dni +")'>";
                lineas += " <span class='glyphicon glyphicon-trash'></span> Borrar</button>";
                lineas += "</td></tr>";
                $("#empleados").find('tbody')
                    .append(lineas);
            }

        })
        .fail(function(peticion, textStatus, errorThrown) {
            alert(peticion.status + " " + errorThrown)
        });
});

function modificar(dni){

    //$.ajax().then();


    $("#myModal").modal();
}

function borrar(dni) {
    $.ajax({
        url:"php/administracion.php",
        data : { accion : 'borrar', dni: dni},
        type: 'POST'
    })
    .then(usuarioBorrado, errorBorrando)
}

function usuarioBorrado(data) {
    if(data == true){
        alert("el usuario fue borrado");
    }
    else{
        alert("el uusario no ha sido borrado");
    }
}
function errorBorrando(data){
    alert("ERROR");
}