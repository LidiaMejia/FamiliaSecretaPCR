<?php

require_once "./dao.php";

//arreglo de datos 
$conexion = initDB();
$lista = getRandom($conexion);


if($lista == 1)
{
    echo "<script> alert('No se pudieron cargar los datos de las Familias'); window.location = 'index.php'; </script>";
}


?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/estilo.css"/>

    <title>Generar Sorteo</title>
</head>
<body id="listBody">

    <header class="p-3 mr-3 mb-5">Parroquia Cristo Resucitado</header>

    <div class="card-body">
        <p>
            ¡Sorteo! <b>Mi Familia Secreta</b> <br>

        </p>
        <button type="submit" name="botgenerar" id="botgenerar" class="btn btn-primary" align="center">Generar Sorteo</button>
    </div>

    <main class="container">
            <div class="col-lg-12">
                <h1 class="mb-4">Listado del Sorteo</h1>

                <div class="row">
                    <div class="col-6 pr-0">
                        <div class="table-responsive ">
                            <table class="table table-striped mb-5">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col-1">No.</th>
                                        <th scope="col-2">Familia 1</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    $tam = count($lista);
                                    for( $i=0; $i<($tam/2); $i++) { ?>
                                    <tr>
                                        <th scope="col-1"> <?php echo $lista[$i]['id']; ?> </th>
                                        <td scope="col-2"> <?php echo $lista[$i]['apellidos']; ?> </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-6 pl-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-5">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col-1">No.</th>
                                        <th scope="col-2">Familia 2</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                    for( $i=($tam/2)+1; $i<$tam; $i++) { ?>
                                    <tr>
                                        <th scope="col-1"> <?php echo $lista[$i]['id']; ?> </th>
                                        <td scope="col-2"> <?php echo $lista[$i]['apellidos']; ?> </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </main>
        
</body>
</html>