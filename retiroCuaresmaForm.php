<?php

require_once "./dao.php";

if($_SERVER["REQUEST_METHOD"] === "GET")
{
    //Obtener Municipios para validar Número de Identidad
    $conexion = initDB();

    $munis = array();
    $munis = getMunicipios($conexion);
}

if(isset($_POST["btnAgregar"]))
{
    $txtIdentidad = $_POST["txtIdentidad"];
    $txtNombre    = $_POST["txtNombre"];
    $txtNum       = $_POST["txtNum"];
    $txtEmail     = $_POST["txtEmail"];
    $txtParroquia = $_POST["txtParroquia"];
    $txtSector     = $_POST["txtSector"];
    $txtMovimiento = $_POST["txtMovimiento"];
    $txtPlaca     = $_POST["txtPlaca"];
    $txtMarca     = $_POST["txtMarca"];
    $txtColor     = $_POST["txtColor"];

    $conexion = initDB();
    $count    = checkIfIdentidadExistsRetiroCuaresma($txtIdentidad, $conexion);

    //Si aún no está registrado, se guardan los datos
    if($count == 0)
    {
        $res = insertRetiroCuaresma($txtIdentidad, $txtNombre, $txtNum, $txtEmail, $txtParroquia, $txtSector, $txtMovimiento, $txtPlaca, $txtMarca, $txtColor, $conexion);

        //Error
        if($res == 1)
        {
            echo "<script> alert('Ocurrió un error al ingresar la Inscripción. Por favor intente de nuevo.'); window.location='retiroCuaresmaForm.php;</script>";
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

    <title>Retiro Cuaresmal</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <header class="p-3 mr-3 mb-5"><a href="../" data-toggle="tooltip" data-placement="top" title="Inicio">Parroquia Cristo Resucitado<a></header>

    <main class="container">
        <div class="row">
            <div class="col-12">

                <!-- Card del Formulario -->
                <div class="card shadow lg p-3 mb-5 bg-white">
                    <div class="card-header text-center">
                        <img src="imgs/LogoParroquia.png" class="img-logo-alone" alt="Logo de la Parroquia"/>
                    </div>
                    <div class="card-header text-center h1-form">
                        <h4>Inscripción para el Retiro Cuaresmal "Camino Cuaresmal a la Luz de Pablo de Tarso"</h4>
                        <h5>Del 13 al 17 de Marzo - 6:30 PM a 8:30 PM (Club de Oficiales de la Fuerza Aérea)</h5>
                    </div>

                    <div class="card-body d-flex justify-content-center align-items-center flex-wrap text-center">
                        <p>Para realizar la inscripción llene los siguientes datos:</p>

                        <form action="retiroCuaresmaForm.php" id="retiroCuaresmaRegister" method="POST">
                        
                            <div class="form-row d-flex justify-content-center align-items-center flex-wrap text-center">

                                <!-- Error Identidad -->
                                <div class="col-lg-8 mb-4 text-center">
                                    <div id="alertError" class="alert alert-danger alert-dismissible fade show <?php echo ( isset($_POST) ? ( ($count == 0 ) ? 'd-none' : 'd-block'): 'd-none' ); ?>" role="alert">
                                        Ya existe una inscripción asociada con el número de identidad ingresado. Deberá ingresar otro número.
                                    </div>
                                </div>

                                <div class="col-lg-8 mb-4">
                                    <h6><b>DATOS PERSONALES</b></h6>
                                </div>

                                <!-- Identidad -->
                                <div class="col-lg-6 mb-4">
                                    <label for="txtIdentidad">Número de Identidad (Sin guiones)</label>
                                    <input type="tel" name="txtIdentidad" id="txtIdentidad" minlength="13" maxlength="13" placeholder="0801199100123" class="form-control" autofocus required/>
                                    <div id="IDInvalid" class="d-none">Debe ingresar una identidad válida de 13 dígitos</div>
                                </div>

                                <!-- Nombre -->
                                <div class="col-lg-6 mb-4">
                                    <label for="txtNombre">Nombre Completo</label>
                                    <input type="text" name="txtNombre" id="txtNombre" minlength="2" maxlength ="200" placeholder="José Vicente Carratala Pérez" class="form-control" autofocus required>
                                    <div id="nombreInvalid" class="d-none">Debe ingresar un nombre válido. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- Número -->
                                <div class="col-lg-6 mb-4">
                                    <label for="txtNum">Número de Celular</label>
                                    <input type="tel" name="txtNum" id="txtNum" minlength="8" maxlength="8" placeholder="32340015" class="form-control" required/>
                                    <div id="celInvalid" class="d-none">Debe ingresar un número válido de 8 dígitos</div>
                                </div>

                                <!-- Email -->
                                <div class="col-lg-6 mb-4">
                                    <label for="txtEmail">Correo Electrónico</label>
                                    <input type="email" name="txtEmail" id="txtEmail" minlength="4" maxlength="100" placeholder="tucorreo@gmail.com" class="form-control"/>
                                    <div id="emailInvalid" class="d-none">Debe ingresar un correo válido</div>
                                </div>

                                <div class="col-lg-8 mb-4">
                                    <h6><b>DATOS PARROQUIALES</b></h6>
                                </div>

                                <!-- Parroquia -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtParroquia">Parroquia</label>
                                    <input type="text" name="txtParroquia" id="txtParroquia" minlength="2" maxlength ="255" placeholder="Parroquia Cristo Resucitado" class="form-control" autofocus required>
                                    <div id="parroquiaInvalid" class="d-none">Debe ingresar una parroquia válida. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- Sector -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtSector">Sector Parroquial</label>
                                    <input type="text" name="txtSector" id="txtSector" minlength="2" maxlength ="255" placeholder="Sede Parroquial" class="form-control" autofocus required>
                                    <div id="sectorInvalid" class="d-none">Debe ingresar un sector válido. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- Movimiento -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtMovimiento">Pastoral o Movimiento</label>
                                    <input type="text" name="txtMovimiento" id="txtMovimiento" minlength="2" maxlength ="255" placeholder="Pastoral Juvenil" class="form-control" autofocus required>
                                    <div id="movimientoInvalid" class="d-none">Debe ingresar un movimiento válido. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <h6><b>DATOS PARA INGRESO AL CLUB</b></h6>
                                </div>

                                <!-- Placa -->
                                <div class="col-lg-4 mb-4">
                                    <label for="txtPlaca">Placa del Vehículo</label>
                                    <input type="text" name="txtPlaca" id="txtPlaca" minlength="6" maxlength ="7" placeholder="HAR2470" class="form-control" autofocus required>
                                    <div id="placaInvalid" class="d-none">Debe ingresar una placa válida. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- Marca -->
                                <div class="col-lg-4 mb-4">
                                    <label for="txtMarca">Marca del Vehículo</label>
                                    <input type="text" name="txtMarca" id="txtMarca" minlength="2" maxlength ="55" placeholder="Toyota" class="form-control" autofocus required>
                                    <div id="marcaInvalid" class="d-none">Debe ingresar una marca válida. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- Color -->
                                <div class="col-lg-4 mb-4">
                                    <label for="txtColor">Color del Vehículo</label>
                                    <input type="text" name="txtColor" id="txtColor" minlength="2" maxlength ="55" placeholder="Negro" class="form-control" autofocus required>
                                    <div id="colorInvalid" class="d-none">Debe ingresar un color válido. Sin espacios en blanco al iniciar o finalizar</div>
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
        let txtIdentidad  = document.getElementById("txtIdentidad");
        let IDInvalid     = document.getElementById("IDInvalid");

        let txtNombre     = document.getElementById("txtNombre");
        let nombreInvalid = document.getElementById("nombreInvalid");

        let txtNum        = document.getElementById("txtNum");
        let celInvalid    = document.getElementById("celInvalid");

        let txtEmail      = document.getElementById("txtEmail");
        let emailInvalid  = document.getElementById("emailInvalid");

        let txtParroquia     = document.getElementById("txtParroquia");
        let parroquiaInvalid = document.getElementById("parroquiaInvalid");

        let txtSector      = document.getElementById("txtSector");
        let sectorInvalid  = document.getElementById("sectorInvalid");

        let txtMovimiento      = document.getElementById("txtMovimiento");
        let movimientoInvalid  = document.getElementById("movimientoInvalid");

        let txtPlaca      = document.getElementById("txtPlaca");
        let placaInvalid  = document.getElementById("placaInvalid");

        let txtMarca      = document.getElementById("txtMarca");
        let marcaInvalid  = document.getElementById("marcaInvalid");

        let txtColor      = document.getElementById("txtColor");
        let colorInvalid  = document.getElementById("colorInvalid");

        //Validar Identidad
        if(valEmptyField(txtIdentidad.value) || !valIdentidad(txtIdentidad.value, <?php echo json_encode($munis) ?>))
        {
            txtIdentidad.style.borderColor = "red";
            IDInvalid.classList.remove("d-none");
            IDInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtIdentidad.style.borderColor = "#ced4da";
            IDInvalid.classList.add("d-none");
        }


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

        //validar Parroquia
        if(valEmptyField(txtParroquia.value) || !valName(txtParroquia.value))
        {
            txtParroquia.style.borderColor = "red";
            parroquiaInvalid.classList.remove("d-none");
            parroquiaInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtParroquia.style.borderColor = "#ced4da";
            parroquiaInvalid.classList.add("d-none");
        }

        //validar Sector
        if(valEmptyField(txtSector.value) || !valCompleteText(txtSector.value))
        {
            txtSector.style.borderColor = "red";
            sectorInvalid.classList.remove("d-none");
            sectorInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtSector.style.borderColor = "#ced4da";
            sectorInvalid.classList.add("d-none");
        }

        //validar Movimiento
        if(valEmptyField(txtMovimiento.value) || !valCompleteText(txtMovimiento.value))
        {
            txtMovimiento.style.borderColor = "red";
            movimientoInvalid.classList.remove("d-none");
            movimientoInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtMovimiento.style.borderColor = "#ced4da";
            movimientoInvalid.classList.add("d-none");
        }

        //validar Placa
        if(valEmptyField(txtPlaca.value) || !valPlacaVehiculo(txtPlaca.value))
        {
            txtPlaca.style.borderColor = "red";
            placaInvalid.classList.remove("d-none");
            placaInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtPlaca.style.borderColor = "#ced4da";
            placaInvalid.classList.add("d-none");
        }

        //validar Marca
        if(valEmptyField(txtMarca.value) || !valName(txtMarca.value))
        {
            txtMarca.style.borderColor = "red";
            marcaInvalid.classList.remove("d-none");
            marcaInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtMarca.style.borderColor = "#ced4da";
            marcaInvalid.classList.add("d-none");
        }

        //validar Color
        if(valEmptyField(txtColor.value) || !valName(txtColor.value))
        {
            txtColor.style.borderColor = "red";
            colorInvalid.classList.remove("d-none");
            colorInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtColor.style.borderColor = "#ced4da";
            colorInvalid.classList.add("d-none");
        }

        if(c == 0)
        {
            onClick = 'document.forms['btnAgregar'].submit();'; 
        }
    });

</script>