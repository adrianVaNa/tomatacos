<?php

require 'libs/vendor/autoload.php';
include 'includes/operaciones.php';

$ops = new operaciones();
$app = new Slim\App();

//Dirección que regresa valores de prueba contenidos en el archivo sample.txt
$app->get('/locations_file', function ($request, $response, $args) {
	$myfile = fopen("sample.txt", "r") or die("Unable to open file!");
	$arr = fread($myfile,filesize("sample.txt"));
	fclose($myfile);

    return $response->withJson($arr,200);
});

$app->get('/ciudades', function ($request, $response, $args) use($ops) {
    $ciudades = $ops->verCiudades();
    return $response->withJson($ciudades['respuesta'], $ciudades['status']);
});

$app->get('/puntos/{ciudad}', function ($request, $response, $args) use($ops){
    $puntos = $ops->verPuntosCiudad($args['ciudad']);
    return $response->withJson($puntos['respuesta'], $puntos['status']);
    // return $response->withJson($args,200);
});

$app->run();