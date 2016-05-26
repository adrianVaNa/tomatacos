<?php

require 'vendor/autoload.php';

$app = new Slim\App();

$app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
});

$app->get('/', function () {
    echo 'EEEEE uto!!';
});

$app->get('/eh', function () {
    echo 'EEEEE uto!!';
});

$app->run();