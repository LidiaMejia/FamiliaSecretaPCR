<?php

require_once "./dao.php";

if(isset($_POST["btnAgregar"]))
{
    $txtNombreNino = $_POST["txtNombreNino"];
    $txtEdadNino   = $_POST["txtEdadNino"];

    $txtNombreMadre = $_POST["txtNombreMadre"];
    $txtNumMadre    = $_POST["txtNumMadre"];

    $txtNombrePadre = $_POST["txtNombrePadre"];
    $txtNumPadre    = $_POST["txtNumPadre"];

    $checkBautismo = 0;
    $checkComunion = 0;

    //Los checkbox solo se envían al servidor si están chequeados
    if(isset($_POST["checkBautismo"]))
    {
        $checkBautismo = 1;
    }

    if(isset($_POST["checkComunion"]))
    {
        $checkComunion = 1;
    }

    $conexion = initDB();
    $count    = checkIfGrupoOracionInfantilExists($txtNombreNino, $txtNombreMadre, $txtNombrePadre, $conexion);

    //Si aún no está registrado, se guardan los datos
    if($count == 0)
    {
        $res = insertgrupoOracionInfantil($txtNombreNino, $txtEdadNino, $txtNombreMadre, $txtNumMadre, $txtNombrePadre, $txtNumPadre,
                                          $checkBautismo, $checkComunion, $conexion);
        //Error
        if($res == 1)
        {
            echo "<script> alert('Ocurrió un error al ingresar la Inscripción. Por favor intente de nuevo.'); window.location='grupoOracionInfantilForm.php;</script>";
        }
        else
        {
            echo "<script>window.location='successfully.php';</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/estilo.css"/>
    <script src="js/validators.js"></script>
    
    <title>Grupos de Oración Infantil</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <header class="p-0 m-0 pt-3 pb-3 mb-4"><a href="../" data-toggle="tooltip" data-placement="top" title="Inicio">Parroquia Cristo Resucitado<a></header>

    <main class="container">
        <div class="row">
            <div class="col-12">

                <!-- Card del Formulario -->
                <div class="card shadow lg p-3 mb-5 bg-white">
                    <div class="card-header text-center">
                        <img src="imgs/LogoParroquia.png" class="img-logo-alone" alt="Logo de la Parroquia"/>
                    </div>
                    <div class="card-header text-center h1-form">
                        <h1 style="font-size: 2rem;">Inscripción para los Grupos de Oración Infantil (2 a 12 años)</h1>
                        <h5>Fecha límite de Inscripción: Domingo 27 de Agosto de 2023</h5>
                    </div>

                    <div class="card-body d-flex justify-content-center align-items-center flex-wrap text-center">
                        <p>Para realizar la inscripción llene los siguientes datos:</p>

                        <form action="oracionInfantilForm.php" id="oracionInfantilFormRegister" method="POST">
                        
                            <div class="form-row d-flex justify-content-center align-items-center flex-wrap text-center">

                                <!-- Error Nombres -->
                                <div class="col-lg-8 mb-4 text-center">
                                    <div id="alertError" class="alert alert-danger alert-dismissible fade show <?php echo ( isset($_POST) ? ( ($count == 0 ) ? 'd-none' : 'd-block'): 'd-none' ); ?>" role="alert">
                                        Ya existe una inscripción asociada a los nombres del Niño y los Padres. Deberá ingresar otros nombres
                                    </div>
                                </div>

                                <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                                <!-- Nombre de Niño -->
                                <div class="col-lg-5 mb-4 mr-md-2">
                                    <label for="txtNombreNino">Nombre completo del Niño</label>
                                    <input type="text" name="txtNombreNino" id="txtNombreNino" minlength="2" maxlength ="100" placeholder="María Isabel Pérez Pérez" class="form-control" autofocus required>
                                    <div id="nombreNinoInvalid" class="d-none">Debe ingresar un nombre válido. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- Edad del Niño -->
                                <div class="col-lg-5 mb-4">
                                    <label for="txtEdadNino">Edad del Niño</label>
                                    <input type="number" name="txtEdadNino" id="txtEdadNino" minlength="1" maxlength="2" min="2" max="12" placeholder="7" class="form-control" required/>
                                    <div id="EdadNinoInvalid" class="d-none">Debe ingresar una edad válida entre 2 y 12 años</div>
                                </div>

                                <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                                <!-- Nombre de la Madre -->
                                <div class="col-lg-5 mb-4 mr-md-2">
                                    <label for="txtNombreMadre">Nombre completo de la Madre del Niño</label>
                                    <input type="text" name="txtNombreMadre" id="txtNombreMadre" minlength="2" maxlength ="100" placeholder="Amanda María Moncada Pérez" class="form-control" required>
                                    <div id="nombreMadreInvalid" class="d-none">Debe ingresar un nombre válido. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- Número de la Madre -->
                                <div class="col-lg-5 mb-4">
                                    <label for="txtNumMadre">Número de Celular de la Madre del Niño</label>
                                    <input type="tel" name="txtNumMadre" id="txtNumMadre" minlength="8" maxlength="8" placeholder="32340015" class="form-control" required/>
                                    <div id="numMadreInvalid" class="d-none">Debe ingresar un número válido de 8 dígitos</div>
                                </div>

                                <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                                <!-- Nombre del Padre -->
                                <div class="col-lg-5 mb-4 mr-md-2">
                                    <label for="txtNombrePadre">Nombre completo del Padre del Niño</label>
                                    <input type="text" name="txtNombrePadre" id="txtNombrePadre" minlength="2" maxlength ="100" placeholder="José Luis Pérez Rivera" class="form-control" required>
                                    <div id="nombrePadreInvalid" class="d-none">Debe ingresar un nombre válido. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- Número del Padre -->
                                <div class="col-lg-5 mb-4">
                                    <label for="txtNumPadre">Número de Celular del Padre del Niño</label>
                                    <input type="tel" name="txtNumPadre" id="txtNumPadre" minlength="8" maxlength="8" placeholder="94280305" class="form-control" required/>
                                    <div id="numPadreInvalid" class="d-none">Debe ingresar un número válido de 8 dígitos</div>
                                </div>

                                <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                                <!-- Sacramentos realizados -->
                                <div class="col-lg-8 mb-5">
                                    <label>Sacramentos realizados por el niño(a)</label>
                                    <br/>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="checkBautismo" id="checkBautismo">
                                        <label class="form-check-label" for="checkBautismo">Bautismo</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="checkComunion" id="checkComunion">
                                        <label class="form-check-label" for="checkComunion">Primera Comunión</label>
                                    </div>
                                </div>

                                <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                                <div class="col-lg-8 mb-4">                                                                          
                                    <button type="submit" name="btnAgregar" id="btnAgregar" class="btn btn-primary">Realizar Inscripción</button>
                                </div>    

                            </div>
                        </form>
                    </div>
                </div>

                <!-- fin del Formulario -->

            </div>
        </div>
       
    </main>

    <footer class="p-0 m-0 pt-3 pb-3 mt-3"></footer>
</body>

</html>


<script>

    let btnAgregar = document.getElementById("btnAgregar");

    btnAgregar.addEventListener("click", function(e)
    {
        e.preventDefault();
        e.stopPropagation();

        let c = 0; //Contador de errores

        //Obtener los datos
        let txtNombreNino     = document.getElementById("txtNombreNino");
        let nombreNinoInvalid = document.getElementById("nombreNinoInvalid");
        let txtEdadNino       = document.getElementById("txtEdadNino");
        let EdadNinoInvalid   = document.getElementById("EdadNinoInvalid");

        let txtNombreMadre     = document.getElementById("txtNombreMadre");
        let nombreMadreInvalid = document.getElementById("nombreMadreInvalid");
        let txtNumMadre        = document.getElementById("txtNumMadre");
        let numMadreInvalid    = document.getElementById("numMadreInvalid");

        let txtNombrePadre     = document.getElementById("txtNombrePadre");
        let nombrePadreInvalid = document.getElementById("nombrePadreInvalid");
        let txtNumPadre        = document.getElementById("txtNumPadre");
        let numPadreInvalid    = document.getElementById("numPadreInvalid");

        //Validar Nombre Niño
        if(valEmptyField(txtNombreNino.value) || !valName(txtNombreNino.value))
        {
            txtNombreNino.style.borderColor = "red";
            nombreNinoInvalid.classList.remove("d-none");
            nombreNinoInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtNombreNino.style.borderColor = "#ced4da";
            nombreNinoInvalid.classList.add("d-none");
        }

        //Validar Edad Niño
        if(valEmptyField(txtEdadNino.value) || !valEdad(txtEdadNino.value))
        {
            
            txtEdadNino.style.borderColor = "red";
            EdadNinoInvalid.classList.remove("d-none");
            EdadNinoInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtEdadNino.style.borderColor = "#ced4da";
            EdadNinoInvalid.classList.add("d-none");
        }

        //Validar Nombre Madre
        if(valEmptyField(txtNombreMadre.value) || !valName(txtNombreMadre.value))
        {
            txtNombreMadre.style.borderColor = "red";
            nombreMadreInvalid.classList.remove("d-none");
            nombreMadreInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtNombreMadre.style.borderColor = "#ced4da";
            nombreMadreInvalid.classList.add("d-none");
        }

        //Validar Celular Madre
        if(valEmptyField(txtNumMadre.value) || !valCel(txtNumMadre.value))
        {
            txtNumMadre.style.borderColor = "red";
            numMadreInvalid.classList.remove("d-none");
            numMadreInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtNumMadre.style.borderColor = "#ced4da";
            numMadreInvalid.classList.add("d-none");
        }

        //Validar Nombre Padre
        if(valEmptyField(txtNombrePadre.value) || !valName(txtNombrePadre.value))
        {
            txtNombrePadre.style.borderColor = "red";
            nombrePadreInvalid.classList.remove("d-none");
            nombrePadreInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtNombrePadre.style.borderColor = "#ced4da";
            nombrePadreInvalid.classList.add("d-none");
        }

        //Validar Celular Padre
        if(valEmptyField(txtNumPadre.value) || !valCel(txtNumPadre.value))
        {
            txtNumPadre.style.borderColor = "red";
            numPadreInvalid.classList.remove("d-none");
            numPadreInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtNumPadre.style.borderColor = "#ced4da";
            numPadreInvalid.classList.add("d-none");
        }

        if(c == 0)
        {
            onClick = 'document.forms['btnAgregar'].submit();'; 
        }
    });

</script>