<?php

require_once "./dao.php";

//Obtener datos
if(isset($_POST["botAgregar"]))
{
    $txtApellidos  = $_POST["txtApellidos"];
    $txtCel        = $_POST["txtCel"];
    $txtEmail      = $_POST["txtEmail"];
    $selectCapilla = $_POST["selectCapilla"];

    //echo $txtApellidos. " " .$txtCel. " " .$txtEmail. " " .$selectCapilla;

    $conexion = initDB();
    $res = insertFamilia($txtApellidos, $txtCel, $txtEmail, $selectCapilla, $conexion);

    echo "<script>alert('$res'); window.location='index.php';</script>";

}

?>


<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/estilo.css"/>
    <script src="js/validators.js"></script>
    <!-- Por si se necesita js para ciertas funcionalidades de bootstrap -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->

    <title>Familia Secreta PCR</title>
</head>

<body>
    <header class="p-3 mr-3 mb-5">Parroquia Cristo Resucitado</header>

    <main class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Card que contiene el formulario. p = padding  mb = margin-bottom  d-none = display: none -->
                <div class="card shadow-lg p-3 mb-5 bg-white">
                    <div class="card-header">
                        <img src="imgs/LogoFamilia.png" class="img-fluid p-lg-5" alt="Fondo Dorado, Mes de la Familia, Logo de la Parroquia"/>
                    </div>
                    <div class="card-body">
                        <p>Únete a nuestra celebración del Mes de la Familia con la actividad "Familia Secreta", donde cada familia inscrita recibirá la encomienda de orar
                            por una familia en particular elegida al azar, la cual revelarán hasta finalizar el mes. <b>¡No te quedes sin inscribir a tu familia en esta jornada de oración!</b>
                        </p>
                        <form action="index.php" id="formRegister" method="POST">
                            <div class="form-row">
                                <div class="col-lg-6 mb-4">
                                    <label for="txtApellidos">Apellidos de la Familia</label>
                                    <input type="text" name="txtApellidos" id="txtApellidos" maxlength="100" placeholder="García Martinez" class="form-control" required/>
                                    <div id="apellidoInvalid" class="d-none">Debe ingresar apellidos válidos</div>
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <label for="txtCel">Número de Celular</label>
                                    <input type="tel" name="txtCel" id="txtCel" maxlength="8" placeholder="32340015" class="form-control"/>
                                    <div id="celInvalid" class="d-none">Debe ingresar un número válido de 8 dígitos</div>
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <label for="txtEmail">Correo Electrónico</label>
                                    <input type="email" name="txtEmail" id="txtEmail" maxlength="100" placeholder="tucorreo@gmail.com" class="form-control" />
                                    <div id="emailInvalid" class="d-none">Debe ingresar un correo válido</div>
                                </div>

                                <div class="form-group col-lg-6 mb-4">
                                    <label for="selectCapilla">Capilla</label>
                                    <select name="selectCapilla" class="form-control">
                                        <option value="Parroquia Cristo Resucitado" selected>Parroquia Cristo Resucitado</option>
                                        <option value="Altos de Loarque">Altos de Loarque, Nuestra Señora del Carmen</option>
                                        <option value="Yagüasire">Yagüasire, San Antonio de Padua</option>
                                        <option value="Las Mercedes">Las Mercedes</option>
                                    </select>
                                </div>

                            <button type="submit" name="botAgregar" id="botAgregar" class="btn btn-primary">INSCRIBIR FAMILIA</button>
                        </form>
                    </div>
                </div>
                <!-- Fin Card que contiene el formulario -->
            </div>
        </div>
    </main>

    <footer class="p-3"></footer>
    
</body>

</html>

<script>
    var botAgregar = document.getElementById("botAgregar");

    //Click Botón
    botAgregar.addEventListener("click", function(e)
    {
        e.preventDefault();
        e.stopPropagation();

        var cont = 0; //Contador de Errores

        //Obtener datos
        var txtApellidos    = document.getElementById("txtApellidos");
        var apellidoInvalid = document.getElementById("apellidoInvalid");

        var txtCel          = document.getElementById("txtCel");
        var celInvalid      = document.getElementById("celInvalid");

        var txtEmail        = document.getElementById("txtEmail");
        var emailInvalid    = document.getElementById("emailInvalid");

        //Validar Apellidos
        if( valEmptyField(txtApellidos.value) || !valName(txtApellidos.value) )
        {
            txtApellidos.style.borderColor = "red";
            apellidoInvalid.classList.remove("d-none");
            apellidoInvalid.classList.add("errorSi");
            cont++;
        }
        else
        {
            txtApellidos.style.borderColor = "#ced4da";
            apellidoInvalid.classList.add("d-none");
        }

        //Validar Celular si se ingresa uno
        if( !valEmptyField(txtCel.value) && !valCel(txtCel.value) )
        {
            txtCel.style.borderColor = "red";
            celInvalid.classList.remove("d-none");
            celInvalid.classList.add("errorSi");
            cont++;
        }
        else 
        {
            txtCel.style.borderColor = "#ced4da";
            celInvalid.classList.add("d-none");
        }

        //Validar Correo si se ingresa uno
        if( !valEmptyField(txtEmail.value) && !valEmail(txtEmail.value) )
        {
            txtEmail.style.borderColor = "red";
            emailInvalid.classList.remove("d-none");
            emailInvalid.classList.add("errorSi");
            cont++;
        }
        else
        {
            txtEmail.style.borderColor = "#ced4da";
            emailInvalid.classList.add("d-none");
        }

        if(cont == 0)
        {
            //document.getElementById("formRegister").submit(); //No ingresa al $_POST
            onClick="document.forms["botAgregar"].submit();"    //Se sube desde el botón
        }
    });
</script>