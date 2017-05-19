$(document).ready( function() {
    $('#agregar').on('click',envioReq);
    $('#login').bootstrapValidator({
        
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
        },

        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido',
                    }
                }
            },
            apellido: {
                validators: {
                    notEmpty: {
                        message: 'El apellido es requerido',
                    }
                }
            },
            dni: {
                validators: {
                    notEmpty: {
                        message: 'El dni es requerido',

                    }
                }
            }
        }
    })
});

function envioReq()
{
    
    var formData = new FormData();
    var foto = $('#idFoto')[0];
    var empleado = {
        'nombre': $('#idName').val(),
        'apellido': $('#idApellido').val(),
        'dni': $('#idDni').val(),
        'sexo': $( "input[name='sexo']:checked" ).val(),
        'legajo': $('#idLegajo').val(),
        'sueldo': $('#idSueldo').val(),
        'foto': foto.files[0],
    }
    for (var key in empleado) {
        formData.append(key, empleado[key]);
    }
    formData.append('accion', 'agregar');
    var resultado = validarFormData(empleado);
    if(resultado.resultado){

        $.ajax({
            type: 'POST',
            url:'php/administracion.php',
            data:formData,
            processData: false,
            contentType: false,
            async: true,
        })
        .done(function(data){
            var info = JSON.parse(data);
            if(info.exito == true){
                var src = "fotos/" + info.empleado.foto;
                
                lineas = "<h3> Empleado agregado!</h3>";
                lineas += "<img class=\"img-circle\" src =\"" + src + "\" width='150px' height='100px'/>";
                lineas += "<h3>" + info.empleado.nombre + " " + info.empleado.apellido + "</h3>";
                lineas += "<p>"+"Dni: " + info.empleado.dni + "</p>";
                lineas += "<p>"+"Sexo: " + info.empleado.sexo + "</p>";
                lineas += "<p>"+"Legajo: " + info.empleado.legajo + "</p>";
                lineas += "<p>"+"Sueldo: $" + info.empleado.sueldo + "</p>";
                $("#resultado").html(lineas);
                var boton = "<a class='btn btn-primary' href=" + info.link+ " role='button'>Mostrar Empleados.</a>"
                $("#resultado").append(boton);
            }
            else
                alert(info.mensaje);
        })
        .fail(function(data){
            alert('NO ANDA');
        });
    }
    else{
        alert(resultado.mensaje);
    }
    
    
    
}
function validarFoto(foto) {
    var valido;
    var error = '';
    if(foto !== undefined) {
        valido = true;
        var datos = foto.type.split("/");
        var tipo  = datos[0];
        var extension = datos[1];
    }

    else {
        valido = false;
        error = ' archivo no subida ';
    }
    
    var extensionesValidas = ['jpg', 'png', 'gif'];
    if( valido && tipo != 'image'){
        valido = false;
        error = 'tipo no valido';
    }
    if(valido && foto.size > 1048576){
        valido = false;
        error  = 'La imagen es demasiado larga';
    }
    if( valido && !tipo == 'image'){
        valido = false;
        error = 'tipo no valido';
    }
    return {
        valido: valido,
        error: error
    };
}
function validarString(str){
    
    return /^[a-zA-Z]+$/.test(str);
    
}
function validarNumero(numero){
    if(numero != "" && !isNaN(numero))
        return true;
    else
        return false;
}



function validarFormData(empleado){
    var resultado = true;
    var mensaje = "";
    if(!validarString(empleado.nombre)){
        resultado = false;
        mensaje = 'nombre invalido';
    }
    
    if(resultado && !validarString(empleado.apellido)){
        resultado = false;
        mensaje = 'apellido invalido';
    }
    var dniLength = empleado.dni;
    dniLength = dniLength.length;
    if(resultado  && !validarNumero(empleado.dni))
    {
        resultado = false;
        mensaje = 'dni invalido';
    }
    // VER LO DE LENGTH DEL DNI
    if( resultado && dniLength > 8){
        resultado = false;
        mensaje = 'dni muy largo';
    }
    if(resultado && empleado.sexo != 'M' && empleado.sexo != 'F') {
        resultado = false;
        mensaje = 'sexo invalido';
    }
    if(resultado && !validarNumero(empleado.legajo)){
        resultado = false;
        mensaje = 'legajo invalido';
    }
    if(resultado && !validarNumero(empleado.sueldo)){
        resultado = false;
        mensaje = 'sueldo invalido';
    }
    if(resultado) {
        var resultadoFoto = validarFoto(empleado.foto);
        if(!resultadoFoto.valido) {
            mensaje = resultadoFoto.error;
        }
    }
    return {
        resultado: resultado,
        mensaje: mensaje
    };
}
