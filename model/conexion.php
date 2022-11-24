<?php

require_once 'config.php';

//"mysql:host=$servidor;dbname=nombreDeTuBaseDeDatos"
$servidor = "mysql:host=".SERVIDOR.";dbname=".BD;
//echo $servidor;

try{
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
// echo "<script>alert('conexion establecida')</script>";
}
catch(Exception $e){
echo $e->getMessage();
echo "<script>alert('error en la conexion')</script>";
}

