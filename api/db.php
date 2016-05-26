<?php
// Cambiar de acuerdo a las necesidades del server
function conectaBD() {
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="tomatacos";
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConnection;
}

?>