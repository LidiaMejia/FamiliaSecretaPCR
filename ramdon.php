<?php

require_once "./dao.php";

//arreglo de datos 
$conexion = initDB();
$lista = getRamdom($conexion);


if($lista == 1)
{
    echo "<script> alert('No se pudieron cargar los datos de las Familias'); window.location = 'index.php'; </script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/estilo.css"/>
    <script src="https://kit.fontawesome.com/b17457e142.js" crossorigin="anonymous"></script>

    <title>Generar Sorteo</title>
</head>
<body>

    <header class="p-3 mr-3 mb-5">Parroquia Cristo Resucitado</header>
    <div class="card-body">
        <p>
            ¡Sorteo! <b>Mi Familia Secreta</b> <br>

        </p>
        <button type="submit" name="botgenerar" id="botgenerar" class="btn btn-primary" align="center">Generar Sorteo</button>
    </div>
    <main class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="mb-4">Listado de Sorteo</h1>

                <div class="table-responsive">
                    <table class="table table-striped mb-5">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Familia 1</th>
                                <th scope="col">No.</th>
                                <th scope="col">Familia 2</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach($lista as $familia) { ?>
                            <tr>
                                <th scope="row"> <?php echo $familia['id']; ?> </th>
                                <td> <?php echo $familia['apellidos']; ?> </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
       


        
</body>
</html>