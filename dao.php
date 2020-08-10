<?php

function initDB()
{
    //Parámetros de conexión
    $hostname = "127.0.0.1";
    $username = "userp";
    $password = "r3suc1t4d0";
    $database = "familiaspcr";
    $port     = "3306";

    //Establecer conexión
    $conexion = mysqli_connect($hostname, $username, $password, $database, $port);
    $conexion->set_charset("utf8"); //Definir el tipo de codificacion

    if(!$conexion)
    {
        //echo "Ocurrió un error";
        //echo "No se pudo establecer la conexión con la Base de Datos";
        die($conexion->connect_error);
    }

    return $conexion;
}

//FUNCIONES OPERATIVAS
function insertFamilia($apellidos, $celular, $email, $capilla, $conexion)
{
    $query =  "INSERT INTO familias (apellidos, celular, email, capilla) VALUES (?,?,?,?)";
    $data  =  $conexion->prepare($query);
    $data->bind_param("ssss", $apellidos, $celular, $email, $capilla);
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
    $query = "SELECT * FROM familias;";
    $data  = $conexion->prepare($query);
    $data->execute();
    $result = $data->get_result();

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

?>