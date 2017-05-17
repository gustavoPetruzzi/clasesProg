$(document).ready( inicializar);

function inicializar() {
    $('#agregar').on('click', insertarForm);
    $('#mostrar').on('click', function() {
        window.location.href = 'mostrar.html';
    })
    $('#modificar').on('click', function() {
        window.location.href = 'modificar.html';
    })
    
}

function insertarForm() {
    $.ajax({
        url:'php/administracion.php',
        method:"POST",
        data: {accion: 'form' },
    }).then(validado, error);
}

function validado(data) {
    $("#principal").html(data);
    $("#principal").ready(validarDatos);
    
}

function error(data) {
    $("#informe").html(":(");
}






function validarDatos(){
    $("#datosEmpleado").bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',

            invalid: 'glyphicon glyphicon-remove',
        },
        message: 'Este valor no es valido',
        fields: {
            Nombre: {
                feedbackIcons: true,
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido',
                    }
                }
            },
            Apellido: {
                validators: {
                    notEmpty: {
                        message: 'El apellido es requerido',
                    }
                }
            },
            Dni: {
                validators: {
                    notEmpty: {
                        message: 'El dni es requerido',

                    }
                }
            }
        }
    })
    $("#datosEmpleado").submit(function(event){
        event.preventDefault();
        var datos = new FormData();
        var foto = $('#Foto')[0];
        datos.append('accion', 'agregar');
        datos.append('nombre', $("#Nombre").val());
        datos.append('apellido', $("#Apellido").val());
        datos.append('dni',$("#Dni").val());
        datos.append('sexo', $( "input[name='sexo']:checked" ).val());
        datos.append('sueldo', $("#Sueldo").val());
        datos.append('legajo', $("#Legajo").val());
        datos.append('foto', foto.files[0]);

        $.ajax({
            url:'php/administracion.php',
            method:'POST',
            dataType: 'json',
            data: datos,
            processData: false,
            contentType: false,
            async: true,
        }).then(empleado, errorEmpleado);
    });

    function empleado(data){
        console.info(data);
    }
    function errorEmpleado(data){
        console.info(data);
    }
}