function borrar(id){
	var formData = new FormData();
	formData.append('borrar', true);
	formData.append('codigo', id );
	$.ajax({
		method:'POST',
		url: 'administracion.php',
		data: formData,
        //dataType: 'json',
        processData: false,
        contentType: false,
		async: true,
	})
	.done( function(data) {
		document.write(data);
	})
    .fail(function(jqXHR, textStatus, errorThrown){
        alert('error' + errorThrown);
    })
}

function modificar(id, nombre, path){
	var formData = new FormData();
	formData.append('codigo', id);
	formData.append('nombre', nombre);
	formData.append('path', path);
	$.ajax({
		method:'POST',
		url: 'modificar.php',
		data: formData,
        //dataType: 'json',
        processData: false,
        contentType: false,
		async: true,
	})
	.done(function(data){
		document.write(data);
	})
	
	
}