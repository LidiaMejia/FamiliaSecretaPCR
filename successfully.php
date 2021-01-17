<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilo.css" />
    <script src="https://kit.fontawesome.com/b17457e142.js" crossorigin="anonymous"></script>

    <title>Registro Exitoso</title>
</head>

<body>
    <header class="p-0 m-0 pt-3 pb-3 mb-4"><a href="../" data-toggle="tooltip" data-placement="top" title="Inicio">Parroquia Cristo Resucitado<a></header>

    <main class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-lg p-3 mb-5 bg-white">
                    <div class="card-header" id="card-headerCheck">
                        <br>
                        <img src="imgs/clipboard.png" class="mx-auto d-block" id="check" alt="Ícono de libreta con cheque verde. Hecho por smashicons.com en flaticon.com"/>
                    </div>
                    <div class="card-body">
                        <h2>¡GRACIAS POR REALIZAR TU INSCRIPCIÓN!</h2>
                    </div>
                    <div class="card-footer">
                      <br>

                      <div>
                          <p class="text-center">Si lo deseas, puedes realizar otra inscripción:</p>
                          <div>
                            <button type="button" name="botPrimeraC" id="botPrimeraC" class="btn btn-danger btn-pcr ml-3 successButtons">Primera Comunión</button>
                            <button type="button" name="botConfirma" id="botConfirma" class="btn btn-danger btn-pcr ml-3 successButtons">Confirma</button>
                            <button type="button" name="botCAdultos" id="botCAdultos" class="btn btn-danger btn-pcr ml-3 successButtons">Catequesis Adultos</button>
                            <button type="button" name="botCoroN"    id="botCoroN"    class="btn btn-danger btn-pcr ml-3 successButtons">Coro Niños</button>
                            <button type="button" name="botCoroA"    id="botCoroA"    class="btn btn-danger btn-pcr ml-3 successButtons">Coro Adultos</button>
                          </div>
                      </div>

                      <br>
                      <br>
                      <br>
                        <p id="mediap">Síguenos para seguir participando de nuestras actividades</p>
                        <a data-toggle="tooltip" data-placement="bottom" title="Facebook" class="btn-floating btn-lg" id="fb" type="button" role="button" href="https://es-la.facebook.com/parroquiacristoresucitadohn/"><i class="fab fa-facebook fa-2x"></i></a>
                        <a data-toggle="tooltip" data-placement="bottom" title="Twitter" class="btn-floating btn-lg" id="tw" type="button" role="button" href="https://twitter.com/cristo_hn"><i class="fab fa-twitter fa-2x"></i></a>
                        <a data-toggle="tooltip" data-placement="bottom" title="Youtube" class="btn-floating btn-lg" id="yt" type="button" role="button" href="https://www.youtube.com/channel/UCDZi5Fc70E2pPzze72SSpcw"><i class="fab fa-youtube fa-2x"></i></a>
                        <a data-toggle="tooltip" data-placement="bottom" title="Instagram" class="btn-floating btn-lg" id="it" type="button" role="button" href="https://www.instagram.com/cristohn_resucitado/"><i class="fab fa-instagram fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="p-3"></footer>
</body>

</html>

<script>

    let botPrimeraC = document.getElementById("botPrimeraC");
    let botConfirma = document.getElementById("botConfirma");
    let botCAdultos = document.getElementById("botCAdultos");
    let botCoroN    = document.getElementById("botCoroN");
    let botCoroA    = document.getElementById("botCoroA");

    //Primera Comunión Form
    botPrimeraC.addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();

        window.location = "comunionForm.php";
    });

    //Confirma Form
    botConfirma.addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();

        window.location = "confirmaForm.php";
    });

    //Catequesis Adultos Form
    botCAdultos.addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();

        window.location = "catequesisAdultosForm.php";
    });

    //Coro para Niños Form
    botCoroN.addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();

        window.location = "coroNinosForm.php";
    });

    //Coro para Adultos Form
    botCoroA.addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();

        window.location = "coroAdultosForm.php";
    });

</script>