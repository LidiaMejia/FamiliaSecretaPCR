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

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/estilo.css"/>
    <script src="https://kit.fontawesome.com/b17457e142.js" crossorigin="anonymous"></script>

    <title>Listado de Familias</title>
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
                                <td> <?php echo $familia['capilla']; ?> </td>
                                <td><i class="fas fa-trash mr-3 ml-3" name="trash" id="<?php echo $familia['id']; ?>"></i></td>
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
    var trash = document.getElementsByName("trash");

    for(let i=0; i<trash.length; i++)
    {
        trash[i].addEventListener("click", function(e){
            //confirm("CLICK: "+trash[i].getAttribute("id"));
            var opcion = confirm("Clicka en Aceptar o Cancelar");
            if (opcion == true) {
                //Funcion Borrado en dao pasando el attr id
                alert("BORRASTE: " + trash.value); 
            } else {
            }
        });
    }

    //Mandar a Llamar los datos arriba, se recibe un row
    // enmmedio del html se muestra ese row
    // en id de trash se coloca el row id
    // cuando se de clic se valida si quiere borrar o no
</script>