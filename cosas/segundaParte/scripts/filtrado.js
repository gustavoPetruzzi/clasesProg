$(document).ready(function(){
    var datos = new FormData();
    datos.append('accion', 'traer');
    $.ajax({
        method: 'POST',
        url:"administracion.php",
        processData: false,
        data: datos,
        contentType: false,
        async: true,
    })
    .done(function(data) {
        var containers = JSON.parse(data);
        var paisActual = "";
        var tabla = "<thead> <th> Numero </th> <th> Descripcion </th> <th> Pais </th> <th> Foto </th> <th> Borrar </th>" + "</tbody>";
        
        for (var index in containers) {
            
            var foto = "fotos/" + containers[index].foto;
            tabla+= "<tr>";
            tabla+= "<td>" + containers[index].numero + "</td>";
            tabla+= "<td>" + containers[index].descripcion + "</td>";
            tabla+= "<td>" + containers[index].pais + "</td>";
            tabla+= "<td>" + "<img src='"+ foto +"' height='100' style='padding: 1px;'>  </td>";
            if(paisActual !=containers[index].pais){
                $('#paises').append($('<option>', {
                value: containers[index].pais,
                text: containers[index].pais
                }));
            }
            paisActual = containers[index].pais;
        } 
        tabla+= "</tbody>";
        $("#principal").html(tabla);
    });
    $('#buscar').click(function(){
        
        var buscar = new FormData();
        var pais =  $('#paises').find(":selected").text();
        buscar.append('accion', 'buscar');
        buscar.append('pais', pais );
        $.ajax({
            method: 'POST',
            url:"administracion.php",
            processData: false,
            data: buscar,
            contentType: false,
            async: true,
        })
        .done(function(data) {
            var containers = JSON.parse(data);
            console.log(containers);
            var tabla = "<thead> <th> Numero </th> <th> Descripcion </th> <th> Pais </th> <th> Foto </th> <th> Borrar </th>" + "</tbody>";
            for (var index in containers) {
                
                var foto = "fotos/" + containers[index].foto;
                tabla+= "<tr>";
                tabla+= "<td>" + containers[index].numero + "</td>";
                tabla+= "<td>" + containers[index].descripcion + "</td>";
                tabla+= "<td>" + containers[index].pais + "</td>";
                tabla+= "<td>" + "<img src='"+ foto +"' height='100' style='padding: 1px;'>  </td>";
                tabla+= "<td>" + "<button class='btn btn primary' onclick='borrar("+containers[index].numero +")'> borrar </button> </td>";
            } 
            tabla+= "</tbody>";
            $("#principal").html(tabla);
        });
    })
})

function borrar(numero){
    var datos = new FormData();
    datos.append('accion', 'borrar');
    datos.append('numero', numero);
    $.ajax({
        method: 'POST',
        url:"administracion.php",
        processData: false,
        data: datos,
        contentType: false,
        async: true,
    })
    .done(function(borrado) {
        alert(borrado);
    })
    .fail(function(data, algo, algo2){
        alert("falla");

    });
} 