<?php

require_once "./dao.php";

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/estilo.css"/>
    <script src="https://kit.fontawesome.com/b17457e142.js" crossorigin="anonymous"></script>


    <title>Inscripciones</title>
</head>
<body id="Inscriptions">

    <header class="p-3 mr-3 mb-5">Parroquia Cristo Resucitado</header>

    <div class="card-body">
        <p>
            ¡Inscripciones! <b>Parroquia Cristo Resucitado</b> <br>

            <br> <i>"Inscripciones para Bautismo, Confirmas, Primera Comunión, Coro de Niños y Adultos"</i>

        </p>
        <button type="submit" name="botgenerar" id="botgenerar" class="btn btn-primary" onclick="mostrarRandom();">Requisitos</button>
    </div>

    <main class="container">

       
    </main>
        
</body>
</html>

<script type="text/javascript">

 function mostrarRandom()
 {
    
     document.getElementById('uno').style.display = "block";
     document.getElementById('botgenerar').style.display = "none";
     setTimeout(MostrarTabla,5000);
   
 }

 function MostrarTabla()
 {
    document.getElementById('uno').style.display = "none";
    document.getElementById('tableRandom').style.display = "block";
 }
 

 </script>