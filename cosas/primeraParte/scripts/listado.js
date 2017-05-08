function borrar(usuario){
    
    var datos = new FormData();
    datos.append("accion", 'borrar');
    datos.append('correo', usuario);
    $.ajax({
        method: 'POST',
        url:"administracion.php",
        processData: false,
        data: datos,
        contentType: false,
		async: true,
    })
    .done(function(data) {
        $('#respuesta').html = data;
    })
    .fail(function(data, algo, algo2){
        alert("falla");
        $('#respuesta').html = data + " " + algo + " " + algo2;
    })
}
