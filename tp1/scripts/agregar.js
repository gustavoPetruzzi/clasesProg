$(document).ready( function() {
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
    /*
    $.ajax({
        type: 'POST',
        url:'php/administracion.php',
        data: formData,
        processData: false,
        contentType: false,
        async: true,
    })
    .done(function(data){
        alert(data);
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
    */
    
    var resultado = validarFormData(empleado); 
    alert(resultado.mensaje);
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
    if(valido && $.inArray(extension, ['jpg', 'png', 'gif', 'bmp']) == -1){
        valido = false;
        error = 'extension no valida';
    }
    return {
        valido: valido,
        error: error
    };
}
function validarDatos(){
    $("#datosEmpleado").bootstrapValidator({
        
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
}
