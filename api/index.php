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
		    (nombre, ciudad, estado, domicilio, telefono, texto, coord_lat,coord_lon)
		    VALUES ('".$data['nombre']."','".$data['ciudad']."','".$data['estado']."','".$data['domicilio']."','".$data['telefono']."','".$data['texto']."','".$data['lat']."', '".$data['len']."');";
    try{
    	$stmt = $bd->query($sql);
    }catch(PDOException $e){
    	echo '{"error":"true" , "texto":'. $e->getMessage() .'}';
    }

    $bd=NULL;
});

$app->get('/locations', function () {
	$bd=conectaBD();
	$sql = "SELECT * FROM restaurantes";
	try{
    	$stmt = $bd->query($sql);
    	$res = $stmt->fetchAll(PDO::FETCH_OBJ);
    	$bd = null;
    	echo json_encode($res);
    }catch(PDOException $e){
    	echo '{"error":"true" , "texto":'. $e->getMessage() .'}';
    }
});

$app->get('/locations_file', function () {
	$myfile = fopen("sample.txt", "r") or die("Unable to open file!");
	echo fread($myfile,filesize("sample.txt"));
	fclose($myfile);
});

$app->run();