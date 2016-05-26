<?php

require 'vendor/autoload.php';
include 'db.php';

$app = new Slim\App();

$app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
});

$app->get('/', function () {
    echo 'EEEEE uto!!';
});

$app->post('/new_location', function ($request, $response, $args) {
    $json = $request->getBody();
    //echo $json;
    $data = json_decode($json, true);
    $bd=conectaBD();
    $sql = "INSERT INTO restaurantes 
		    (coord_lat,coord_lon)
		    VALUES ('".$data['lat']."', '".$data['len']."');";
    try{
    	$stmt = $bd->query($sql);
    }catch(PDOException $e){
    	echo '{"error":"true" , "texto":'. $e->getMessage() .'}';
    }

    $bd=NULL;
});

$app->run();