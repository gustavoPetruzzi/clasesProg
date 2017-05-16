
function MostrarError()
{
	alert("error");
	$.ajax({
		url:"nexoNoExiste.php",

	}).then(funcionUno, funcionDos);

	function funcionUno(retorno){
		$("#principal").html(retorno.respo)
	}
	function funcionDos(retorno){
		console.info(retorno);
		$("#informe").html(retorno.responseText);
		$("#principal").html("error :(");
	}
	//url:"nexoNoExiste.php",type:"post"
}
function MostrarSinParametros()
{
	$.ajax({
		url:"nexoTexto.php",

	}).then(funcionUno, funcionDos);

	function funcionUno(retorno){
		$("#principal").html(retorno);
		console.info(retorno);
	}
	function funcionDos(retorno){
		console.info(retorno);
		$("#informe").html(retorno.responseText);
		$("#principal").html("error :(");
	}

	
}

function Mostrar(queMostrar)
{
		$.ajax({
			url:"nexo.php",
			type: "POST",
			data: { queHacer: queMostrar}

		}).then(funcionUno, funcionDos);

		function funcionUno(retorno){
			$("#principal").html(retorno);
		}
		function funcionDos(retorno){
			$("#informe").html(retorno.responseText);
			$("#principal").html("error :(");
		}
	
		//url:"nexo.php",
		//type:"post",
	
}

function MostarLogin()
{
		//alert(queMostrar);
		$.ajax({
		url:"nexo.php",
		type: "POST",
		data: { queHacer: 'MostarLogin'}

		}).then(funcionUno, funcionDos);

		function funcionUno(retorno){
			$("#principal").html(retorno);
		}
		function funcionDos(retorno){
			$("#informe").html(retorno.responseText);
			$("#principal").html("error :(");
		}


	/*ESTO FUNCIONA LA CAMBIO CON LA DE ARRIBA
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
	*/
}