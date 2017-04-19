$(document).ready(function() {
    $.ajax({
        url:'php/mostrar.php',
        type:'GET',
        dataType: 'json'
    })
    .done(function(data){
        var info = data;
        //var objeto = JSON.parse(info);
        for (var element in info) {
            var empleado = info[element];
            alert(empleado.nombre);
        }
        
    })
    .fail(function(peticion, textStatus, errorThrown){
        alert(peticion.status + " " + errorThrown)
    });
});


