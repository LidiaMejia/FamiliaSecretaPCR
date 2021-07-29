<?php

function initDB()
{
    //Parámetros de conexión
    $hostname = "127.0.0.1";
    $username = "cristore_ins";
    $password = "38QdZiI9gprh";
    $database = "cristore_inscripciones";
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
function checkIfCelExistsComunion($telefono, $conexion)
{
    $query = "SELECT COUNT(*) AS total FROM comunion WHERE telefono = ?";
    $data  = $conexion->prepare($query);
    $data->bind_param("s", $telefono);
    $data->execute();
    $result = $data->get_result();

    if($conexion->error)
    {
        return 1;
    }
    else
    {
        $count = mysqli_fetch_array($result);

        $result->free(); //Liberar la memoria asociada con el resultado
        return $count[0];
    }
}

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

function checkIfCelExistsConfirma($telefono, $conexion)
{
    $query = "SELECT COUNT(*) AS total FROM confirma WHERE telefono = ?";
    $data  = $conexion->prepare($query);
    $data->bind_param("s", $telefono);
    $data->execute();
    $result = $data->get_result();

    if($conexion->error)
    {
        return 1;
    }
    else
    {
        $count = mysqli_fetch_array($result);

        $result->free(); //Liberar la memoria asociada con el resultado
        return $count[0];
    }
}

function insertConfirma($nombre, $edad, $telefono, $email, $conexion)
{
    $query =  "INSERT INTO confirma (nombre, edad, telefono, email) VALUES (?,?,?,?)";
    $data  =  $conexion->prepare($query);
    $data->bind_param("ssss", $nombre, $edad, $telefono, $email);
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

function checkIfCelExistsAdultos($telefono, $conexion)
{
    $query = "SELECT COUNT(*) AS total FROM adultos WHERE telefono = ?";
    $data  = $conexion->prepare($query);
    $data->bind_param("s", $telefono);
    $data->execute();
    $result = $data->get_result();

    if($conexion->error)
    {
        return 1;
    }
    else
    {
        $count = mysqli_fetch_array($result);

        $result->free(); //Liberar la memoria asociada con el resultado
        return $count[0];
    }
}

function insertAdultos($nombre, $edad, $telefono, $email, $bautismo, $comunion, $confirma, $conexion)
{
    $query =  "INSERT INTO adultos (nombre, edad, telefono, email, bautismo, comunion, confirma) VALUES (?,?,?,?,?,?,?)";
    $data  =  $conexion->prepare($query);
    $data->bind_param("sssssss", $nombre, $edad, $telefono, $email, $bautismo, $comunion, $confirma);
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

function checkIfCelExistsCoroKids($telefono, $conexion)
{
    $query = "SELECT COUNT(*) AS total FROM Corokids WHERE telefono = ?";
    $data  = $conexion->prepare($query);
    $data->bind_param("s", $telefono);
    $data->execute();
    $result = $data->get_result();

    if($conexion->error)
    {
        return 1;
    }
    else
    {
        $count = mysqli_fetch_array($result);

        $result->free(); //Liberar la memoria asociada con el resultado
        return $count[0];
    }
}

function insertCoroKids($nombre, $edad, $telefono, $email, $conexion)
{
    $query =  "INSERT INTO Corokids (nombre, edad, telefono, email) VALUES (?,?,?,?)";
    $data  =  $conexion->prepare($query);
    $data->bind_param("ssss", $nombre, $edad, $telefono, $email);
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

function checkIfCelExistsCoroAdultos($telefono, $conexion)
{
    $query = "SELECT COUNT(*) AS total FROM Coroadultos WHERE telefono = ?";
    $data  = $conexion->prepare($query);
    $data->bind_param("s", $telefono);
    $data->execute();
    $result = $data->get_result();

    if($conexion->error)
    {
        return 1;
    }
    else
    {
        $count = mysqli_fetch_array($result);

        $result->free(); //Liberar la memoria asociada con el resultado
        return $count[0];
    }
}

function insertCoroAdultos($nombre, $edad, $telefono, $email, $conexion)
{
    $query =  "INSERT INTO Coroadultos (nombre, edad, telefono, email) VALUES (?,?,?,?)";
    $data  =  $conexion->prepare($query);
    $data->bind_param("ssss", $nombre, $edad, $telefono, $email);
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

// function getFamilias($conexion)
// {
//     $query  = "SELECT * FROM familias;";
//     $result = $conexion->query($query);
//     // $data  = $conexion->prepare($query);
//     // $data->execute();
//     // $result = $data->get_result();

//     $resultArray = array(); //Array para guardar todos los datos

//     //Verificar si se obtuvieron datos
//     if(isset($result) && $result != '' )
//     {
//         foreach ($result as $row) 
//         {
//             $resultArray[] = $row;
//         }

//         $result->free(); //Liberar la memoria asociada con el resultado

//         return $resultArray;
//     }
//     else
//     {
//         return 1;
//     }
// }

// function deleteFamilia($id, $conexion)
// {
//     $query = "DELETE FROM familias WHERE id = ?;";
//     $data  = $conexion->prepare($query);
//     $data->bind_param("d", $id);
//     $data->execute();

//     if($conexion->error)
//     {
//         return 1;
//     }
//     else
//     {
//         return 0;
//     }
// }

// function getRandom($conexion)
// {
//     $query = "SELECT COUNT(id)AS TOTAL FROM familias";
//     $result = $conexion->query($query);

//     $resultArray = array();

//     if(isset($result) && $result != '' )
//     {
//         $count  = mysqli_fetch_array($result);
//         $count  = $count[0];

//         $sql = "SELECT * FROM familias ORDER BY rand(". time() ."*". time() .")LIMIT $count ";
//         $resultado = mysqli_query($conexion,$sql);

//         foreach($resultado as $row)
//         {
//             $resultArray[] = $row;
//         }
//         $resultado->free(); //Liberar la memoria asociada con el resultado

//         return $resultArray;
        
//     }
//     else
//     {
//         return 1;
//     }

// }

?>