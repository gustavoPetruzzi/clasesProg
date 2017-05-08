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
    .done(function(data) {
        alert(data);
    })
    .fail(function(data, algo, algo2){
        alert("falla");

    });
} 