<?php

require_once "./dao.php";

if(isset($_POST["btnAgregar"]))
{
    $txtNombre = $_POST["txtNombre"];
    $txtEdad   = $_POST["txtEdad"];
    $txtNum    = $_POST["txtNum"];
    $txtEmail  = $_POST["txtEmail"];

    $conexion = initDB();
    $count    = checkIfCelExistsCoroKids($txtNum, $conexion);

    //Si aún no está registrado, se guardan los datos
    if($count == 0)
    {
        $res = insertCoroKids($txtNombre, $txtEdad, $txtNum, $txtEmail, $conexion);

        //Error
        if($res == 1)
        {
            echo "<script> alert('Ocurrió un error al ingresar la Inscripción. Por favor intente de nuevo.'); window.location='coroNinosForm.php;</script>";
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
    <title>Coro para Niños</title>
</head>

<body>
    <header class="p-3 mr-3 mb-5"><a href="index.php" data-toggle="tooltip" data-placement="top" title="Inicio">Parroquia Cristo Resucitado<a></header>

    <main class="container">
        <div class="row">
            <div class="col-12">

                <!-- Card del Formulario -->
                <div class="card shadow lg p-3 mb-5 bg-white">
                    <div class="card-header text-center">
                        <img src="imgs/LogoParroquia.png" class="img-logo-alone" alt="Logo de la Parroquia"/>
                    </div>
                    <div class="card-header text-center h1-form">
                        <h1>Inscripción de Coro para Niños</h1>
                    </div>

                    <div class="card-body d-flex justify-content-center align-items-center flex-wrap text-center">
                        <p>Para realizar la inscripción llene los siguientes datos:</p>

                        <form action="coroNinosForm.php" id="coroNinosRegister" method="POST">
                        
                            <div class="form-row d-flex justify-content-center align-items-center flex-wrap text-center">

                                <!-- Error Cel -->
                                <div class="col-lg-8 mb-4 text-center">
                                    <div id="alertError" class="alert alert-danger alert-dismissible fade show <?php echo ( isset($_POST) ? ( ($count == 0 ) ? 'd-none' : 'd-block'): 'd-none' ); ?>" role="alert">
                                        Ya existe una inscripción asociada con el número de celular ingresado. Deberá ingresar otro número
                                    </div>
                                </div>

                                <!-- nombre -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtNombre">Nombre Completo</label>
                                    <input type="text" name="txtNombre" id="txtNombre" minlength="2" maxlength ="200" placeholder="José Vicente Carratala Pérez" class="form-control" autofocus required>
                                    <div id="nombreInvalid" class="d-none">Debe ingresar un nombre válido. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- edad -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtEdad">Edad</label>
                                    <input type="tel" name="txtEdad" id="txtEdad" minlength="1" maxlength="2" placeholder="33" class="form-control" required/>
                                    <div id="EdadInvalid" class="d-none">Debe ingresar una edad válida</div>
                                </div>

                                <!-- Número -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtNum">Número de Celular</label>
                                    <input type="tel" name="txtNum" id="txtNum" minlength="8" maxlength="8" placeholder="32340015" class="form-control" required/>
                                    <div id="celInvalid" class="d-none">Debe ingresar un número válido de 8 dígitos</div>
                                </div>

                                <!-- Email -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtEmail">Correo Electrónico</label>
                                    <input type="email" name="txtEmail" id="txtEmail" minlength="4" maxlength="100" placeholder="tucorreo@gmail.com" class="form-control"/>
                                    <div id="emailInvalid" class="d-none">Debe ingresar un correo válido</div>
                                </div>
                               
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

        let c = 0; //contador para errores

        //para obtener los datos
        let txtNombre     = document.getElementById("txtNombre");
        let nombreInvalid = document.getElementById("nombreInvalid");

        let txtEdad       = document.getElementById("txtEdad");
        let EdadInvalid   = document.getElementById("EdadInvalid");

        let txtNum        = document.getElementById("txtNum");
        let celInvalid    = document.getElementById("celInvalid");

        let txtEmail      = document.getElementById("txtEmail");
        let emailInvalid  = document.getElementById("emailInvalid");


        //validar Nombre
        if(valEmptyField(txtNombre.value) || !valName(txtNombre.value))
        {
            txtNombre.style.borderColor = "red";
            nombreInvalid.classList.remove("d-none");
            nombreInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtNombre.style.borderColor = "#ced4da";
            nombreInvalid.classList.add("d-none");
        }

        //Validar Edad
        if(valEmptyField(txtEdad.value) || !valEdad(txtEdad.value))
        {
            
            txtEdad.style.borderColor = "red";
            EdadInvalid.classList.remove("d-none");
            EdadInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtEdad.style.borderColor = "#ced4da";
            EdadInvalid.classList.add("d-none");
        }

        //Validar Celular
        if(valEmptyField(txtNum.value) || !valCel(txtNum.value))
        {
            txtNum.style.borderColor = "red";
            celInvalid.classList.remove("d-none");
            celInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtNum.style.borderColor = "#ced4da";
            celInvalid.classList.add("d-none");
        }

        //valida Email
        if(!valEmptyField(txtEmail.value) && !valEmail(txtEmail.value))
        {
            txtEmail.style.borderColor = "red";
            emailInvalid.classList.remove("d-none");
            emailInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtEmail.style.borderColor = "#ced4da";
            emailInvalid.classList.add("d-none");
        }

        if(c == 0)
        {
            onClick = 'document.forms['btnAgregar'].submit();'; 
        }
    });

</script>