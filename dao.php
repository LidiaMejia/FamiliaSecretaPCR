<?php

//Parámetros de conexión
$hostname = "127.0.0.1";
$username = "userp";
$password = "r3suc1t4d0";
$database = "familiaspcr";
$port     = "3306";

//Establecer conexión
$conexion = mysqli_connect($hostname, $username, $password, $database, $port);

if(!$conexion)
{
    //echo "Ocurrió un error";
    echo "No se pudo establecer la conexión con la Base de Datos";
    die($conexion->connect_error);
}

?>