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
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/estilo.css"/>
    <script src="https://kit.fontawesome.com/b17457e142.js" crossorigin="anonymous"></script>

    <title>Generar Sorteo</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body id="listBody">

    <header class="p-3 mr-3 mb-5">Parroquia Cristo Resucitado</header>

    <div class="card-body">
        <p>
            ¡Sorteo! <b>Mi Familia Secreta</b> <br>

            <br> <i>"Familia Reconciliada y Reconciliadora"</i>

        </p>
        <button type="submit" name="botgenerar" id="botgenerar" class="btn btn-primary" onclick="mostrarRandom();">Generar Sorteo</button>
    </div>

    <div class="loader-container" id="uno">
        <div class="loader"></div>
        <div class="loader2"></div>
   </div>

    <main class="container">

    <div id="tableRandom">
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
                                            <th scope="col-3">Celular</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
                                        $tam = count($lista);
                                        for( $i=0; $i<($tam/2); $i++) { ?>
                                        <tr>
                                            <th scope="col-1"> <?php echo $lista[$i]['id']; ?> </th>
                                            <td scope="col-2"> <?php echo $lista[$i]['apellidos']; ?> </td>
                                            <td scope="col-3"> <?php echo $lista[$i]['celular'];?></td>
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
                                            <th scope="col-3">Celular</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        for( $i=($tam/2)+1; $i<$tam; $i++) { ?>
                                        <tr>
                                            <th scope="col-1"> <?php echo $lista[$i]['id']; ?> </th>
                                            <td scope="col-2"> <?php echo $lista[$i]['apellidos']; ?> </td>
                                            <td scope="col-3"> <?php echo $lista[$i]['celular'];?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>    
    </main>
        
</body>
</html>

<script type="text/javascript">

 function mostrarRandom()
 {
    
     document.getElementById('uno').style.display = "block";
     document.getElementById('botgenerar').style.display = "none";
     setTimeout(MostrarTabla,5000);
   
 }

 function MostrarTabla()
 {
    document.getElementById('uno').style.display = "none";
    document.getElementById('tableRandom').style.display = "block";
 }
 

 </script>