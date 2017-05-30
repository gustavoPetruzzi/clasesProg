<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require_once 'EjemploAjax/clases/accesoDatos.php';
require_once 'EjemploAjax/clases/cd.php';
$app = new \Slim\App;
$app->get('/cd', function (Request $request, Response $response) {
    
    $cds = cd::TraerTodoLosCds();
    $response->getBody()->write(json_encode($cds));

    return $response;
});
$app->post('/cd', function (Request $request, Response $response) {
    
    $miCd = new cd();
    $array = $request->getQueryParams();
    $miCd->titulo = $array['title'];
    $miCd->cantante = $array['interpret'];
    $miCd->año = $array['anio'];
    $miCd->InsertarElCd();
    $response->getBody()->write(var_dump($request->getQueryParams()));

    return $response;
});
$app->run();
