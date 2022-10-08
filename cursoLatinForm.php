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
    $txtIdentidad  = $_POST["txtIdentidad"];
    $txtNombre     = $_POST["txtNombre"];
    $txtResidencia = $_POST["txtResidencia"];
    $selectEdu     = $_POST["selectEdu"];
    $txtNum        = $_POST["txtNum"];
    $txtEmail      = trim($_POST["txtEmail"]) == "" ? null : $_POST["txtEmail"];

    $conexion = initDB();
    $count    = checkIfIdentidadExistsLatin($txtIdentidad, $conexion);

    //Si aún no está registrado, se guardan los datos
    if($count == 0)
    {
        $res = insertCursoLatin($txtIdentidad, $txtNombre, $txtResidencia, $selectEdu, $txtNum, $txtEmail, $conexion);

        //Error
        if($res == 1)
        {
            echo "<script> alert('Ocurrió un error al ingresar la Inscripción. Por favor intente de nuevo.'); window.location='cursoLatinForm.php;</script>";
        }
        else
        {
            echo "<script>window.location='successfully.php?latin=1';</script>";
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

    <title>Curso de Latín</title>

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
                        <h1>Inscripción al Curso de Introducción al Latín</h1>
                    </div>

                    <div class="card-body d-flex justify-content-center align-items-center flex-wrap text-center">
                        <p>Para realizar la inscripción llene los siguientes datos:</p>

                        <form action="cursoLatinForm.php" id="cursoLatinForm" method="POST">
                        
                            <div class="form-row d-flex justify-content-center align-items-center flex-wrap text-center">

                                <!-- Error Cel -->
                                <div class="col-lg-8 mb-4 text-center">
                                    <div id="alertError" class="alert alert-danger alert-dismissible fade show <?php echo ( isset($_POST) ? ( ($count == 0 ) ? 'd-none' : 'd-block'): 'd-none' ); ?>" role="alert">
                                        Ya existe una inscripción asociada con el número de identidad ingresado. Deberá ingresar otro número.
                                    </div>
                                </div>

                                <!-- Identidad -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtIdentidad">Número de Identidad (Sin guiones)</label>
                                    <input type="tel" name="txtIdentidad" id="txtIdentidad" minlength="13" maxlength="13" placeholder="0801199100123" class="form-control" autofocus required/>
                                    <div id="IDInvalid" class="d-none">Debe ingresar una identidad válida de 13 dígitos</div>
                                </div>

                                <!-- Nombre -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtNombre">Nombre Completo</label>
                                    <input type="text" name="txtNombre" id="txtNombre" minlength="2" maxlength ="100" placeholder="José Vicente Melgar Pérez" class="form-control" required>
                                    <div id="nombreInvalid" class="d-none">Debe ingresar un nombre válido. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- Residencia -->
                                <div class="col-lg-8 mb-4">
                                    <label for="txtResidencia">Lugar de Residencia (Departamento o Ciudad)</label>
                                    <input type="text" name="txtResidencia" id="txtResidencia" minlength="4" maxlength ="255" placeholder="Tegucigalpa" class="form-control" required>
                                    <div id="residenciaInvalid" class="d-none">Debe ingresar un lugar válido. Sin espacios en blanco al iniciar o finalizar</div>
                                </div>

                                <!-- Educación -->
                                <div class="col-lg-8 mb-4">
                                    <label for="selectEdu">Nivel de Educación</label>

                                    <select name="selectEdu" class="form-control" required>
                                        <option value="Ninguno" selected>Ninguno</option>
                                        <option value="Preescolar">Preescolar</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                        <option value="Superior">Superior</option>
                                        <option value="Maestría">Maestría</option>
                                        <option value="Doctorado">Doctorado</option>
                                    </select>
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
                                    <input type="email" name="txtEmail" id="txtEmail" minlength="4" maxlength="255" placeholder="tucorreo@gmail.com" class="form-control"/>
                                    <div id="emailInvalid" class="d-none">Debe ingresar un correo válido</div>
                                </div>
                               
                                <div class="col-lg-8 mb-4">                                                                          
                                    <button type="submit" name="btnAgregar" id="btnAgregar" class="btn btn-primary">Realizar Inscripción</button>
                                </div>                               
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Fin del Formulario -->

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

        let c = 0; //Contador para errores

        //Para obtener los datos
        let txtIdentidad  = document.getElementById("txtIdentidad");
        let IDInvalid     = document.getElementById("IDInvalid");

        let txtNombre     = document.getElementById("txtNombre");
        let nombreInvalid = document.getElementById("nombreInvalid");

        let txtNum        = document.getElementById("txtNum");
        let celInvalid    = document.getElementById("celInvalid");

        let txtEmail      = document.getElementById("txtEmail");
        let emailInvalid  = document.getElementById("emailInvalid");

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

        //validar Residencia
        if(valEmptyField(txtResidencia.value) || !valNamePoint(txtResidencia.value))
        {
            txtResidencia.style.borderColor = "red";
            residenciaInvalid.classList.remove("d-none");
            residenciaInvalid.classList.add("errorSi");
            c++;
        }
        else
        {
            txtResidencia.style.borderColor = "#ced4da";
            residenciaInvalid.classList.add("d-none");
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