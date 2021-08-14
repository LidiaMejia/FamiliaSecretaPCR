<?php

require_once "./dao.php";

if(isset($_POST["btnAgregar"]))
{
    $txtNombre        = $_POST["txtNombre"];
    $txtNum           = $_POST["txtNum"];
    $txtEmail         = $_POST["txtEmail"];
    $txtMensaje       = $_POST["txtMensaje"];
    $plantillaTarjeta = $_POST["plantillaTarjeta"];

    $conexion = initDB();
    $count    = checkIfCelExistsFamilias($txtNum, $conexion);

    //Si aún no está registrado, se guardan los datos
    if($count == 0)
    {
        $res = insertFamilias($txtNombre, $txtNum, $txtEmail, $txtMensaje, $plantillaTarjeta, $conexion);

        //Error
        if($res == 1)
        {
            echo "<script> alert('Ocurrió un error al ingresar la Inscripción. Por favor intente de nuevo.'); window.location='tarjetasFamiliasForm.php;</script>";
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
    <title>Tarjeta de Esperanza</title>
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
                        <h1>Inscripción para Tarjeta de Esperanza</h1>
                    </div>

                    <div class="card-body d-flex justify-content-center align-items-center flex-wrap text-center">
                        <p>Para realizar la inscripción llene los siguientes datos:</p>

                        <form action="tarjetasFamiliasForm.php" id="tarjetasRegister" method="POST">
                        
                            <div class="form-row d-flex justify-content-center align-items-center flex-wrap text-center">

                                <!-- Error Cel -->
                                <div class="col-lg-8 mb-4 text-center">
                                    <div id="alertError" class="alert alert-danger alert-dismissible fade show <?php echo ( isset($_POST) ? ( ($count == 0 ) ? 'd-none' : 'd-block'): 'd-none' ); ?>" role="alert">
                                        Ya existe una inscripción asociada con el número de celular ingresado. Deberá ingresar otro número
                                    </div>
                                </div>

                                <!-- Nombre -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtNombre">Nombre de tu Familia</label>
                                    <input type="text" name="txtNombre" id="txtNombre" minlength="2" maxlength ="200" placeholder="Suazo Pérez" class="form-control" autofocus required>
                                    <div id="nombreInvalid" class="d-none">Debe ingresar un nombre válido. Sin espacios en blanco al iniciar o finalizar</div>
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

                                <!-- Mensaje Tarjeta -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtMensaje">Mensaje para la Familia Secreta</label>
                                    <textarea type="text" name="txtMensaje" id="txtMensaje" rows="5" minlength="2" maxlength ="342" placeholder="Mensaje" class="form-control" required></textarea>
                                    <div id="mensajeInvalid" class="d-none">Debe ingresar un mensaje válido. Hasta 342 caracteres</div>
                                </div>
            
                            </div> 

                            <!-- Tarjetas -->
                            <section class="sec-tarjetas">
                                <label for="tarjetas">Marque la plantilla que desee para la Tarjeta</label>

                                <ul class="cont-tarjetas flex-wrap flex-md-nowrap" id="tarjetas"> 
                                    <li>          
                                        <div class="form-check radio-button-container">
                                            <input class="form-check-input" type="radio" name="plantillaTarjeta" id="tarjeta1" value="1" checked>
                                            <label class="form-check-label" for="tarjeta1">
                                                Plantilla #1
                                            </label>
                                        </div>              
                                        <img src="imgs/tarjeta1.png" alt="Marco y letras café, fondo color crema, imagen en la parte inferior de la Sagrada Familia de Nazaret con lirios"/>                         
                                    </li>  
                                    
                                    <li>
                                        <div class="form-check radio-button-container">
                                            <input class="form-check-input" type="radio" name="plantillaTarjeta" id="tarjeta2" value="2">
                                            <label class="form-check-label" for="tarjeta2">
                                                Plantilla #2
                                            </label>
                                        </div>                        
                                        <img src="imgs/tarjeta2.png" alt="Imagen de la Sagrada Familia en la parte superior, letras negras inferiores, fondo blanco"/>                         
                                    </li>
                                    
                                    <li>
                                        <div class="form-check radio-button-container">
                                            <input class="form-check-input" type="radio" name="plantillaTarjeta" id="tarjeta3" value="3">
                                            <label class="form-check-label" for="tarjeta3">
                                                Plantilla #3
                                            </label>
                                        </div>                         
                                        <img src="imgs/tarjeta3.png" alt="Marco y letras rosa, fondo blanco, imagen en la parte superior del corazón de Jesús rodeado por rosas y lirios en pintura de acuarela"/>                        
                                    </li>
                                    
                                    <li>
                                        <div class="form-check radio-button-container">
                                            <input class="form-check-input" type="radio" name="plantillaTarjeta" id="tarjeta4" value="4">
                                            <label class="form-check-label" for="tarjeta4">
                                                Plantilla #4
                                            </label>
                                        </div>                         
                                        <img src="imgs/tarjeta4.png" alt="Letras negras en la parte superior, fondo blanco, silueta de una familia sobre fondo amarillo en la parte inferior junto con el logo de la parroquia"/>                         
                                    </li> 
                                </ul>
                            </section>

                            <div class="form-row d-flex justify-content-center align-items-center flex-wrap text-center">                                                                          
                                <button type="submit" name="btnAgregar" id="btnAgregar" class="btn btn-primary">Realizar Inscripción</button>
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

        let txtNum        = document.getElementById("txtNum");
        let celInvalid    = document.getElementById("celInvalid");

        let txtEmail      = document.getElementById("txtEmail");
        let emailInvalid  = document.getElementById("emailInvalid");

        let txtMensaje     = document.getElementById("txtMensaje");
        let mensajeInvalid = document.getElementById("mensajeInvalid");


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

        //valida Mensaje
        if(valEmptyField(txtMensaje.value) || !valCompleteText(txtMensaje.value))
        {
            txtMensaje.style.borderColor = "red";
            mensajeInvalid.classList.remove("d-none");
            mensajeInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtMensaje.style.borderColor = "#ced4da";
            mensajeInvalid.classList.add("d-none");
        }

        if(c == 0)
        {
            onClick = 'document.forms['btnAgregar'].submit();'; 
        }
    });

</script>