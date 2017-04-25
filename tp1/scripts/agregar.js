$(document).ready( function() {
    $('#agregar').on('click',envioReq)
});

function envioReq()
{
    
    var formData = new FormData();
    var foto = $('#idFoto')[0];
    formData.append('nombre', $('#idName').val());
    formData.append('apellido', $('#idApellido').val());
    formData.append('dni', $('#idDni').val());
    formData.append('sexo', $('.sexo').val());
    formData.append('legajo', $('#idLegajo').val());
    formData.append('sueldo', $('#idSueldo').val());
    formData.append('foto', foto.files[0]);
    formData.append('accion', 'agregar');

    $.ajax({
        type: 'POST',
        url:'php/administracion.php',
        data: formData,
        processData: false,
        contentType: false,
        async: true,
    })
    .done(function(data){
        
        var info = JSON.parse(data);
        var src = "fotos/" + info.empleado.foto;
        
        lineas = "<h3> Empleado agregado!</h3>";
        lineas += "<img class=\"img-circle\" src =\"" + src + "\" width='150px' height='100px'/>";
        lineas += "<h3>" + info.empleado.nombre + " " + info.empleado.apellido + "</h3>";
        lineas += "<p>"+"Dni: " + info.empleado.dni + "</p>";
        lineas += "<p>"+"Sexo: " + info.empleado.sexo + "</p>";
        lineas += "<p>"+"Legajo: " + info.empleado.legajo + "</p>";
        lineas += "<p>"+"Sueldo: $" + info.empleado.sueldo + "</p>";
        $("#resultado").html(lineas);
        $("#link").html(info.link)
    })
    .fail(function(data){
        alert('NO ANDA');
    });
}