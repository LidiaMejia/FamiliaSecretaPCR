<?php

require_once "./dao.php";

if($_SERVER["REQUEST_METHOD"] === "GET")
{
    $fromCursoLatin = false;

    // if(isset($_GET["latin"]))
    // {
    //     if($_GET["latin"] == "1")
    //     {
    //         $fromCursoLatin = true;
    //     }
    // }

    //Obtener id ingresado
    //$conexion = initDB();
    //$id = getIdInscripcionRetiroCuaresma($conexion);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilo.css" />
    <script src="https://kit.fontawesome.com/b17457e142.js" crossorigin="anonymous"></script>

    <title>Registro Exitoso</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <header class="p-0 m-0 pt-3 pb-3 mb-4"><a href="../" data-toggle="tooltip" data-placement="top" title="Inicio">Parroquia Cristo Resucitado<a></header>

    <main class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-lg p-3 mb-5 bg-white">
                    <div class="card-header" id="card-headerCheck">
                        <br>
                        <img src="imgs/clipboard.png" class="mx-auto d-block" id="check" alt="Ícono de libreta con cheque verde. Hecho por smashicons.com en flaticon.com" />
                    </div>
                    <div class="card-body">
                        <h2>¡GRACIAS POR REALIZAR TU INSCRIPCIÓN!</h2>

                        <!-- <h4 class="alert alert-success mt-4 text-center"><b>SU ID DE INSCRIPCIÓN ES: <?php //echo $id ?> <br/> POR FAVOR GUARDAR ESTE NÚMERO YA QUE SE LE SOLICITARÁ AL INGRESAR</b></h4> -->
                    </div>
                    <div class="card-footer">
                        <br>

                        <div>
                            <p class="text-center">Si lo deseas, puedes realizar otra inscripción:</p>
                            <div>
                                <!-- <button type="button" name="botComunion" id="botComunion" class="btn btn-danger btn-pcr ml-3 successButtons">Catequesis Primera Comunión</button>
                                <button type="button" name="botConfirma" id="botConfirma" class="btn btn-danger btn-pcr ml-3 successButtons">Catequesis Confirma</button>
                                <button type="button" name="botCAdultos" id="botCAdultos" class="btn btn-danger btn-pcr ml-3 successButtons">Catequesis Adultos</button>
                                <button type="button" name="botRenovacionVotos" id="botRenovacionVotos" class="btn btn-danger btn-pcr ml-3 successButtons">Renovación de Votos Matrimoniales</button> 
                                <button type="button" name="botTarjetasFamilia" id="botTarjetasFamilia" class="btn btn-danger btn-pcr ml-3 successButtons">Tarjeta de Esperanza</button>
                                <button type="button" name="botLectores" id="botLectores" class="btn btn-danger btn-pcr ml-3 successButtons">Formación de Lectores</button> -->
                                <!-- <button type="button" name="botRetiroCuaresma" id="botRetiroCuaresma" class="btn btn-danger btn-pcr ml-3 successButtons">Retiro Cuaresmal 2023</button> -->
                                <button type="button" name="botAdoradores" id="botAdoradores" class="btn btn-danger btn-pcr ml-3 successButtons">Adoradores del Santísimo Sacramento</button>

                                <!-- <?php if(!$fromCursoLatin): ?>
                                    <button type="button" name="botMonaguillos" id="botMonaguillos" class="btn btn-danger btn-pcr ml-3 successButtons">Monaguillos</button>
                                <?php else: ?>
                                    <button type="button" name="botLatin" id="botLatin" class="btn btn-danger btn-pcr ml-3 successButtons">Curso de Latín</button>
                                <?php endif ?> -->
                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <p id="mediap">Síguenos para seguir participando de nuestras actividades o contactarnos si tienes alguna duda</p>

                        <a data-toggle="tooltip" data-placement="bottom" title="Whatsapp" class="btn-floating btn-lg" id="wh" type="button" role="button" href="https://wa.me/94306883" target="_blank"><i class="fa fa-whatsapp fa-2x" style="color: green;"></i></a>
                        <a data-toggle="tooltip" data-placement="bottom" title="Facebook" class="btn-floating btn-lg" id="fb" type="button" role="button" href="https://es-la.facebook.com/parroquiacristoresucitadohn/" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                        <a data-toggle="tooltip" data-placement="bottom" title="Instagram" class="btn-floating btn-lg" id="it" type="button" role="button" href="https://www.instagram.com/cristohn_resucitado/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                        <a data-toggle="tooltip" data-placement="bottom" title="Youtube" class="btn-floating btn-lg" id="yt" type="button" role="button" href="https://www.youtube.com/channel/UCDZi5Fc70E2pPzze72SSpcw" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
                        <a data-toggle="tooltip" data-placement="bottom" title="Twitter" class="btn-floating btn-lg" id="tw" type="button" role="button" href="https://twitter.com/cristo_hn" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
                        <a data-toggle="tooltip" data-placement="bottom" title="Tiktok" class="btn-floating btn-lg" id="tt" type="button" role="button" href="https://www.tiktok.com/@cristoresucitado_hn" target="_blank"><i class="fab fa-tiktok fa-2x" style="color: black;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="p-3"></footer>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function(){

        // let botComunion        = document.getElementById("botComunion");
        // let botConfirma        = document.getElementById("botConfirma");
        // let botCAdultos        = document.getElementById("botCAdultos");
        // let botLectores        = document.getElementById("botLectores");
        //let botRenovacionVotos = document.getElementById("botRenovacionVotos");
        //let botTarjetasFamilia = document.getElementById("botTarjetasFamilia");
        //let botMonaguillos = document.getElementById("botMonaguillos");
        //let botLatin       = document.getElementById("botLatin");
        // let botRetiroCuaresma = document.getElementById("botRetiroCuaresma");
        let botAdoradores = document.getElementById("botAdoradores");

        //Catequesis Comunión Form
        // botComunion.addEventListener("click", function(e){
        //     e.preventDefault();
        //     e.stopPropagation();

        //     window.location = "comunionForm.php";
        // });

        //Catequesis Confirma Form
        // botConfirma.addEventListener("click", function(e){
        //     e.preventDefault();
        //     e.stopPropagation();

        //     window.location = "confirmaForm.php";
        // });

        //Catequesis Adultos Form
        // botCAdultos.addEventListener("click", function(e){
        //     e.preventDefault();
        //     e.stopPropagation();

        //     window.location = "catequesisAdultosForm.php";
        // });

        //Formación Lectores Form
        // botLectores.addEventListener("click", function(e){
        //     e.preventDefault();
        //     e.stopPropagation();

        //     window.location = "formacionLectoresForm.php";
        // });

        //Renovación de Votos Matrimoniales
        // botRenovacionVotos.addEventListener("click", function(e){
        //     e.preventDefault();
        //     e.stopPropagation();

        //     window.location = "renovacionVotosForm.php";
        // });

        //Tarjeta de Esperanza
        // botTarjetasFamilia.addEventListener("click", function(e){
        //     e.preventDefault();
        //     e.stopPropagation();

        //     window.location = "tarjetasFamiliasForm.php";
        // });

        //Monaguillos
        // if(botMonaguillos != null)
        // {
        //     botMonaguillos.addEventListener("click", function(e) {
        //         e.preventDefault();
        //         e.stopPropagation();

        //         window.location = "monaguillosForm.php";
        //     });
        // }

        //Latin
        // if(botLatin != null)
        // {
        //     botLatin.addEventListener("click", function(e) {
        //         e.preventDefault();
        //         e.stopPropagation();

        //         window.location = "cursoLatinForm.php";
        //     });
        // }

        // //Curso Bilia Form
        // botRetiroCuaresma.addEventListener("click", function(e){
        //     e.preventDefault();
        //     e.stopPropagation();

        //     window.location = "retiroCuaresmaForm.php";
        // });

        //Adoradores del Santísimo
        botAdoradores.addEventListener("click", function(e){
            e.preventDefault();
            e.stopPropagation();

            window.location = "adoradoresForm.php";
        });
    });
</script>