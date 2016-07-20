<?php

/*
*
*             Conexión con base de datos por medio de PDO
*
*                 Ing. Adrián Vázquez Navarrete - 2016
*
*/

class conectaDB
{
    private $con;
 
    function __construct()
    {
 
    }
 
    function conecta()
    {
        include_once dirname(__FILE__) . '/constantes.php';
 
        //Conecta a la base de datos
        //$this->con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD); 
 
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->con->exec("set names utf8");
        return $this->con;
    }
 
}