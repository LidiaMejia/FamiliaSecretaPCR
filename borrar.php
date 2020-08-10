<?php

require_once "./dao.php";

$conexion = initDB();

//Recibe id de familia a borrar en la URI. Sino viene nada por defecto toma el valor de 0
$id = (isset($_GET['id']))? $_GET['id']: 0;

//Llamado a funcion de Borrado en la BDD
$result = deleteFamilia($id, $conexion);

if($result == 1)
{
    echo "<script> alert('Ocurrió un error, el registro no fue borrado'); window.location = 'list.php'; </script>";
}
else
{
    echo "<script> alert('Familia eliminada exitosamente'); window.location = 'list.php'; </script>";
}

?>