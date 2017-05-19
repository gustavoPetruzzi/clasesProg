$(document).ready(function() {
    traerEmpleados();
});

function empleado(dni){
    $.ajax({
        url:"php/administracion.php",
        type:"POST",
        dataType:"json",
        data : {accion : 'buscar', dni : dni}
    }).then(datosModificado,errorBorrando);

}
function datosModificado(data){
    
    if(data.exito){
        $('#myModal').on('show.bs.modal',function(){
            $("#nombre").val(data.empleado.nombre);
            $("#apellido").val(data.empleado.apellido);
            $("#dni").val(data.empleado.dni);
            $("#legajo").val(data.empleado.legajo);
            $("#sueldo").val(data.empleado.sueldo);
            $("#modificar").click(function(){
                var datos = new FormData();
                datos.append('accion', 'modificar');
                datos.append('nombre', $("#nombre").val());
                datos.append('apellido',$("#apellido").val());
                datos.append('dni',$("#dni").val());
                datos.append('legajo',$("#legajo").val());
                datos.append('sueldo',$("#sueldo").val());
                $.ajax({
                    url:"php/administracion.php",
                    data: {accion : 'modificar' },
                    type:'POST',
                    
                }).then(test, errorBorrando);
            })
        });

        $("#myModal").modal();
    }
}

function test(data){
    alert("La puta madre");
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
        traerEmpleados();
    }
    else{
        alert("el uusario no ha sido borrado");
    }
}
function errorBorrando(data){
    alert("ERROR");
}









function traerEmpleados(){
    $("#empleados").find('tbody').html("");
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
                lineas += " onclick='empleado(" + empleado.dni +")' >";
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
}