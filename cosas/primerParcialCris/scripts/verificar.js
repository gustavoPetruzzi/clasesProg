$(document).ready(function(){
    $("#accion").click(function(){
            $("#idEmail").val();
        var datos = new FormData();
        datos.append("accion", 'verificar');
        datos.append('correo', $("#idEmail").val());
        datos.append('clave',$("#idPass").val());
        $.ajax({
            method: 'POST',
            url:"administracion.php",
            processData: false,
            data: datos,
            dataType: "json",
            contentType: false,
		    async: true,
        })
        .done(function(data){
            var resultado = data;
            
            if(resultado){
                window.location.href ="listado.php";
            }
            else
                window.location.href="error.php?error=no existe";
        })
    })
})



