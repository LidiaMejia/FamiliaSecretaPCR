<?php

    // require_once "./dao.php";

    // //Obtener datos
    // if (isset($_POST["botAgregar"])) {
    //     $txtApellidos  = $_POST["txtApellidos"];
    //     $txtCel        = $_POST["txtCel"];
    //     $txtEmail      = $_POST["txtEmail"];
    //     $selectCapilla = $_POST["selectCapilla"];

    //     //echo $txtApellidos. " " .$txtCel. " " .$txtEmail. " " .$selectCapilla;

    //     $conexion = initDB();
    //     $res = insertFamilia($txtApellidos, $txtCel, $txtEmail, $selectCapilla, $conexion);

    //     //Si hay error
    //     if ($res == 1) {
    //         echo "<script>alert('Ocurrió un error al ingresar la familia'); window.location='index.php';</script>";
    //     } else {
    //         echo "<script>window.location='successfully.php';</script>";
    //     }
    // }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilo.css" />
    <script src="js/validators.js"></script>
    <!-- Por si se necesita js para ciertas funcionalidades de bootstrap -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->

    <title>Inscripciones 2021 PCR</title>
</head>

<body>
    <header class="p-0 m-0 pt-3 pb-3 mb-4"><a href="../" data-toggle="tooltip" data-placement="top" title="Inicio">Parroquia Cristo Resucitado<a></header>

    <main class="container">
        <div class="row">
            <div class="col-12">

                <div class="d-flex justify-content-center align-items-center flex-wrap text-center">
                    <img src="imgs/LogoParroquia.png" class="img-fluid logo" alt="Logo de la Parroquia" />
                    <h3>Inscripciones 2021</h3>
                </div>

                <p class="mt-3 text-center">Seleccione la actividad a la cual desea inscribirse:</p>

                <!-- class="row row-cols-1 row-cols-md-2 g-4" -->
                <div class="container"> 
                    <div class="row justify-content-center align-items-center"> 

                        <!-- <div class="col mb-4 inscripcionCardContainer">
                            <div class="card inscripcionCard h-100">
                                <img src="imgs/CatequesisAdultos.png" class="card-img-top" alt="Hombre recibiendo el Bautismo">
                                <div class="card-body">
                                    <br/>
                                    <h5 class="card-title text-center">Catequesis para Adultos</h5>
                                    <br/>         
                                </div>
                                <button type="button" name="botCAdultos" id="botCAdultos" class="btn btn-block btn-danger btn-pcr">INSCRIBIRSE</button>
                            </div>
                        </div> -->

                        <!-- <div class="col mb-4 inscripcionCardContainer">
                            <div class="card inscripcionCard h-100">
                                <img src="imgs/FormacionLectores.jpg" class="card-img-top" alt="Lector en la Santa Eucaristía">
                                <div class="card-body">
                                    <br/>
                                    <h5 class="card-title text-center">Formación de Lectores</h5>
                                    <br/>
                                </div>
                                <button type="button" name="botLectores" id="botLectores" class="btn btn-block btn-danger btn-pcr">INSCRIBIRSE</button>
                            </div>
                        </div> -->

                        <!-- <div class="col mb-4 inscripcionCardContainer">
                            <div class="card inscripcionCard h-100">
                                <img src="imgs/matrimonio.jpg" class="card-img-top" alt="Manos de esposos juntas">
                                <div class="card-body">
                                    <br/>
                                    <h5 class="card-title text-center">Renovación de Votos Matrimoniales</h5>
                                    <br/>
                                </div>
                                <button type="button" name="botRenovacionVotos" id="botRenovacionVotos" class="btn btn-block btn-danger btn-pcr">INSCRIBIRSE</button>
                            </div>
                        </div> -->

                        <!-- <div class="col mb-4 inscripcionCardContainer">
                            <div class="card inscripcionCard h-100">
                                <img src="imgs/familia.png" class="card-img-top" alt="Sagrada Familia de Nazaret">
                                <div class="card-body">
                                    <br/>
                                    <h5 class="card-title text-center">Tarjeta de Esperanza para mi Familia Secreta</h5>
                                    <br/>
                                </div>
                                <button type="button" name="botFamilia" id="botFamilia" class="btn btn-block btn-danger btn-pcr">INSCRIBIRSE</button>
                            </div>
                        </div> -->

                        <div class="col-6 mb-4 inscripcionCardContainer">
                            <div class="card inscripcionCard h-100">
                                <img src="imgs/coroNavidad.jpg" class="card-img-top" alt="Decoración en árbol de navidad en forma de nota musical">
                                <div class="card-body">
                                    <br/>
                                    <h5 class="card-title text-center">Coro Navideño Infantil</h5>
                                    <br/>
                                </div>
                                <button type="button" name="botMonaguillos" id="botMonaguillos" class="btn btn-block btn-danger btn-pcr">INSCRIBIRSE</button>
                            </div>
                        </div>

                        <!-- <div class="col-md-12 mb-4 inscripcionCardContainer">
                            <div class="card inscripcionCard h-100">
                                <div class="card-body">
                                    <h5 class="text-center">DOCUMENTOS REQUERIDOS PARA REALIZAR LOS SACRAMENTOS</h5>
                                    </br>
                                    <h6>Bautizo</h6>
                                    <ol>
                                        <li>Partida de nacimiento original.</li>
                                        <li>Fotocopia de la identidad de los Padrinos (se requieren 2 padrinos para este sacramento que deben estar bautizados por la Iglesia Católica).</li>
                                    </ol>
                                    </br>
                                    <h6>Comunión</h6>
                                    <ol>
                                        <li>Fe de bautismo original.</li>
                                        <li>Partida de nacimiento original o fotocopia de la identidad.</li>
                                        <li>Para este sacramento no se necesitan padrinos.</li>
                                        <li>En caso de ser IMPOSIBLE tener la fe de bautismo, solicitar una “Constancia de Suplatoria” que se solicita en la parroquia donde se bautizaron llevando la evidencia del sacramento (fotografía o el testimonio de personas que puedan dar fe que se realizó el sacramento).</li>
                                    </ol>
                                    </br>
                                    <h6>Confirma</h6>
                                    <ol>
                                        <li>Partida de nacimiento original o fotocopia de la identidad.</li>
                                        <li>Fe de bautismo original (si se van a casar en la Parroquia Cristo Resucitado, la misma que traen para el expediente de matrimonio, se puede utilizar para este sacramento y el de la Comunión).</li>
                                        <li>Fotocopia de la identidad del padrino o madrina (para este sacramento solamente se requiere un padrino, varón para los varones y mujer para las mujeres; también, debe estar bautizado por la Iglesia Católica. Puede ser el mismo padrino o madrina del Bautizo.</li>
                                        <li>Constancia de haber realizado la Primera Comunión (esta constancia la deben solicitar en la parroquia donde realizaron el sacramento, si por algún motivo no es posible tener esta constancia, deben traer alguna evidencia de haber realizado el sacramento, fotografías, por ejemplo).</li>
                                    </ol>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>

            <!-- Card que contiene el formulario. p = padding  mb = margin-bottom  d-none = display: none -->
            <!-- <div class="card shadow-lg p-3 mb-5 bg-white">
                    <div class="card-header">
                        <img src="imgs/LogoFamilia.png" class="img-fluid p-lg-5" alt="Fondo Dorado, Mes de la Familia, Logo de la Parroquia"/>
                    </div>
                    <div class="card-body">
                        <p>Únete a nuestra celebración del Mes de la Familia con la actividad "Mi Familia Secreta", donde cada familia inscrita recibirá la encomienda de orar
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
                                        <option value="Parroquia Cristo Resucitado" selected>Sede Parroquial, Col Loarque</option>
                                        <option value="Altos de Loarque">Altos de Loarque, Nuestra Señora del Carmen</option>
                                        <option value="Yaguasire">Yaguasire, San Antonio de Padua</option>
                                        <option value="Las Mercedes">Las Mercedes</option>
                                        <option value="Otra Parroquia">Otra Parroquia</option>
                                    </select>
                                </div>

                            <button type="submit" name="botAgregar" id="botAgregar" class="btn btn-primary">INSCRIBIR FAMILIA</button>
                        </form>
                    </div>
                </div> -->
            <!-- Fin Card que contiene el formulario -->
            </div>
        </div>
    </main>

    <footer class="p-0 m-0 pt-3 pb-3 mt-3"></footer>

</body>

</html>

<script>
    //let botCAdultos        = document.getElementById("botCAdultos");
    //let botLectores        = document.getElementById("botLectores");
    //let botFamilia           = document.getElementById("botFamilia");
    let botMonaguillos       = document.getElementById("botMonaguillos");
    //let botRenovacionVotos = document.getElementById("botRenovacionVotos");

    //Catequesis Adultos
    // botCAdultos.addEventListener("click", function(e) {
    //     e.preventDefault();
    //     e.stopPropagation();

    //     window.location = "catequesisAdultosForm.php";
    // });

    //Formación de Lectores
    // botLectores.addEventListener("click", function(e) {
    //     e.preventDefault();
    //     e.stopPropagation();

    //     window.location = "formacionLectoresForm.php";
    // });

    //Tarjetas Familias
    // botFamilia.addEventListener("click", function(e){
    //     e.preventDefault();
    //     e.stopPropagation();

    //     window.location = "tarjetasFamiliasForm.php";
    // });

    //Monaguillos
    botMonaguillos.addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();

        window.location = "coroNinosForm.php";
    });

    //Renovación de Votos Matrimoniales
    // botRenovacionVotos.addEventListener("click", function(e){
    //     e.preventDefault();
    //     e.stopPropagation();

    //     window.location = "renovacionVotosForm.php";
    // });

    //Click Botón
    // botAgregar.addEventListener("click", function(e)
    // {
    //     e.preventDefault();
    //     e.stopPropagation();

    //     let cont = 0; //Contador de Errores

    //     //Obtener datos
    //     let txtApellidos    = document.getElementById("txtApellidos");
    //     let apellidoInvalid = document.getElementById("apellidoInvalid");

    //     let txtCel          = document.getElementById("txtCel");
    //     let celInvalid      = document.getElementById("celInvalid");

    //     let txtEmail        = document.getElementById("txtEmail");
    //     let emailInvalid    = document.getElementById("emailInvalid");

    //     //Validar Apellidos
    //     if( valEmptyField(txtApellidos.value) || !valName(txtApellidos.value) )
    //     {
    //         txtApellidos.style.borderColor = "red";
    //         apellidoInvalid.classList.remove("d-none");
    //         apellidoInvalid.classList.add("errorSi");
    //         cont++;
    //     }
    //     else
    //     {
    //         txtApellidos.style.borderColor = "#ced4da";
    //         apellidoInvalid.classList.add("d-none");
    //     }

    //     //Validar Celular si se ingresa uno
    //     if( !valEmptyField(txtCel.value) && !valCel(txtCel.value) )
    //     {
    //         txtCel.style.borderColor = "red";
    //         celInvalid.classList.remove("d-none");
    //         celInvalid.classList.add("errorSi");
    //         cont++;
    //     }
    //     else 
    //     {
    //         txtCel.style.borderColor = "#ced4da";
    //         celInvalid.classList.add("d-none");
    //     }

    //     //Validar Correo si se ingresa uno
    //     if( !valEmptyField(txtEmail.value) && !valEmail(txtEmail.value) )
    //     {
    //         txtEmail.style.borderColor = "red";
    //         emailInvalid.classList.remove("d-none");
    //         emailInvalid.classList.add("errorSi");
    //         cont++;
    //     }
    //     else
    //     {
    //         txtEmail.style.borderColor = "#ced4da";
    //         emailInvalid.classList.add("d-none");
    //     }

    //     if(cont == 0)
    //     {
    //         //document.getElementById("formRegister").submit(); //No ingresa al $_POST
    //         onClick= "document.forms["botAgregar"].submit();"   //Se sube desde el botón
    //     }
    // });
</script>