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
    formData.append('sexo', $( "input[name='sexo']:checked" ).val());
    formData.append('legajo', $('#idLegajo').val());
    formData.append('sueldo', $('#idSueldo').val());
    formData.append('foto', foto.files[0]);
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
    var dni = formData.get('dni');
    var resultado = validarFormData(formData); 
    alert(resultado.mensaje);
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



function validarFormData(formData){
    var resultado = true;
    var mensaje = "";
    if(!validarString(formData.get('nombre'))){
        resultado = false;
        mensaje = 'nombre invalido';
    }
    
    if(resultado && !validarString(formData.get('apellido'))){
        resultado = false;
        mensaje = 'apellido invalido';
    }
    var dniLength = formData.get('dni');
    dniLength = dniLength.length;
    if(resultado  && !validarNumero(formData.get('dni')))
    {
        resultado = false;
        mensaje = 'dni invalido';
    }
    // VER LO DE LENGTH DEL DNI
    if( resultado && dniLength > 8){
        resultado = false;
        mensaje = 'dni muy largo';
    }
    if(resultado && formData.get('sexo') != 'M' && formData.get('sexo') != 'F') {
        resultado = false;
        mensaje = 'sexo invalido';
    }
    if(resultado && !validarNumero(formData.get('legajo'))){
        resultado = false;
        mensaje = 'legajo invalido';
    }
    if(resultado && !validarNumero(formData.get('sueldo'))){
        resultado = false;
        mensaje = 'sueldo invalido';
    }
    
    return {
        resultado: resultado,
        mensaje: mensaje
    };
}
