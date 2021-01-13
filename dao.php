<?php

function initDB()
{
    //Parámetros de conexión
    $hostname = "127.0.0.1";
    $username = "userp";
    $password = "r3suc1t4d0";
    $database = "inscripcionespcr";
    $port     = "3306";

    //Establecer conexión
    $conexion = mysqli_connect($hostname, $username, $password, $database, $port);
    $conexion->set_charset("utf8"); //Definir el tipo de codificacion

    if(!$conexion)
    {
        //echo "Ocurrió un error";
        //echo "No se pudo establecer la conexión con la Base de Datos";
        die();
    }

    return $conexion;
}

//FUNCIONES OPERATIVAS
function insertComunion($nombre, $edad, $telefono, $email, $conexion)
{
    $query =  "INSERT INTO comunion (nombre, edad, telefono, email) VALUES (?,?,?,?)";
    $data  =  $conexion->prepare($query);
    $data->bind_param("ssss", $nombre, $edad, $telefono, $email);
    $data->execute();

    if($conexion->error)
    {
        //$error = $conexion->errno . ' ' . $conexion->error;
        //echo $error;
        return 1;
    }
    else
    {
        return 0;
    }
}

function getFamilias($conexion)
{
    $query  = "SELECT * FROM familias;";
    $result = $conexion->query($query);
    // $data  = $conexion->prepare($query);
    // $data->execute();
    // $result = $data->get_result();

    $resultArray = array(); //Array para guardar todos los datos

    //Verificar si se obtuvieron datos
    if(isset($result) && $result != '' )
    {
        foreach ($result as $row) 
        {
            $resultArray[] = $row;
        }

        $result->free(); //Liberar la memoria asociada con el resultado

        return $resultArray;
    }
    else
    {
        return 1;
    }
}

function deleteFamilia($id, $conexion)
{
    $query = "DELETE FROM familias WHERE id = ?;";
    $data  = $conexion->prepare($query);
    $data->bind_param("d", $id);
    $data->execute();

    if($conexion->error)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

function getRandom($conexion)
{
    $query = "SELECT COUNT(id)AS TOTAL FROM familias";
    $result = $conexion->query($query);

    $resultArray = array();

    if(isset($result) && $result != '' )
    {
        $count  = mysqli_fetch_array($result);
        $count  = $count[0];

        $sql = "SELECT * FROM familias ORDER BY rand(". time() ."*". time() .")LIMIT $count ";
        $resultado = mysqli_query($conexion,$sql);

        foreach($resultado as $row)
        {
            $resultArray[] = $row;
        }
        $resultado->free(); //Liberar la memoria asociada con el resultado

        return $resultArray;
        
    }
    else
    {
        return 1;
    }

}

?>