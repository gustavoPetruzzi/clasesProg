<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';

require_once './EjemploAjax/clases/AccesoDatos.php';
require_once './EjemploAjax/clases/cd.php';
$app = new \Slim\App;
$app->get('/MostrarGrilla', function (Request $request, Response $response) {
    
    
    $response->getBody()->write(include("./EjemploAjax/partes/formGrilla.php"));
    return $response;
});
$app->get('/MostrarFormAlta', function (Request $request, Response $response) {
    
    
    $response->getBody()->write(include("./EjemploAjax/partes/formCd.php"));
    return $response;
});

$app->post('/cd', function (Request $request, Response $response) {
    
    $miCd = new cd();
    $array = $request->getParsedBody();
    $miCd->titulo= filter_var($array['title'], FILTER_SANITIZE_STRING);
    $miCd->cantante= filter_var($array['interpret'], FILTER_SANITIZE_STRING);
    $miCd->año= filter_var($array['anio'], FILTER_SANITIZE_STRING);
    
    $response->getBody()->write( $miCd->InsertarElCd());

    return $response;
});
$app->delete('/cd', function (Request $request, Response $response) {
    
    $miCd = new cd();
    $array = $request->getParsedBody();
    $miCd->id = filter_var($array['id'], FILTER_SANITIZE_STRING);


    
    $response->getBody()->write( $miCd->BorrarCd());

    return $response;
});
// SIN IMPLEMENTACION
/*
$app->put('/cd', function (Request $request, Response $response) {
    
    $miCd = new cd();
    $array = $request->getParsedBody();
    $miCd->id = filter_var($array['id'], FILTER_SANITIZE_STRING);


    
    $response->getBody()->write( $miCd->BorrarCd());

    return $response;
});
*/






$app->get('/login', function (Request $request, Response $response) {
    $response->getBody()->write(include("./EjemploAjax/partes/formLogin.php"));
    return $response;
});
$app->get('/login/botones', function (Request $request, Response $response) {
    $response->getBody()->write(include("./EjemploAjax/partes/botonesABM.php"));
    return $response;
});
$app->post('/login', function (Request $request, Response $response) {
    session_start();
// sin esto no funciona session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

$retorno;

if($usuario=="octavio@admin.com.ar" && $clave=="1234")
{			
	$_SESSION['registrado'] = $usuario;
	if($recordar=="true")
	{
		setcookie("usuario", $usuario, time() + (86400 * 30), "/");
		
	}else
	{
		setcookie("usuario", $usuario, time() - (86400 * 30), "/" );
		
		
	}
	// creo la variable de $_SESSION
	 
	$retorno=" ingreso";

	
}else
{
	$retorno= "No-esta";
}
    $response->getBody()->write($retorno);
    return $response;
});
$app->run();
