<?php

require_once "./dao.php";

$conexion = initDB();
$row = getFamilias($conexion);

if($row == 1)
{
    echo "<script> alert('No se pudieron cargar los datos de las Familias'); window.location = 'index.php'; </script>";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/estilo.css"/>
    <script src="https://kit.fontawesome.com/b17457e142.js" crossorigin="anonymous"></script>

    <title>Listado de Familias</title>
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body id="listBody">

    <header class="p-3 mr-3 mb-5">Parroquia Cristo Resucitado</header>

    <main class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="mb-4">Listado de Familias</h1>

                <div class="table-responsive">
                    <table class="table table-striped mb-5">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Familia</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Correo Electrónico</th>
                                <th scope="col">Capilla</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach($row as $familia) { ?>
                            <tr>
                                <th scope="row"> <?php echo $familia['id']; ?> </th>
                                <td> <?php echo $familia['apellidos']; ?> </td>
                                <td> <?php echo $familia['celular']; ?> </td>
                                <td> <?php echo $familia['email']; ?> </td>
                                <td> <?php echo $familia['capilla']; ?> </td>                           <!-- Enviar varios parámetros con PHP -->
                                <td><i class="fas fa-trash mr-3 ml-3" name="trash" onclick="borrar(<?=$familia['id']?>, '<?=$familia['apellidos']?>')"></i></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="p-3"></footer>

</body>

</html>

<script>
    function borrar(id, fam)
    {
        //Ventana de diálogo con "Aceptar" o "Cancelar"
        var option = confirm("¿Desea eliminar la familia "+id+" - "+fam+"?");

        if(option == true)
        {
            //Va a la página de borrado con el id
            window.location.href = "borrar.php?id=" + id;
        }
    }
</script>

