<!--
            Cognome: Hu
               Nome: Matteo Yanhui
          Matricola: 11519
             Classe: 5^BIN
    Anno scolastico: 2020/2021

          Nome file: index.php
    Ultima modifica: 29/05/2021
-->

<?php
session_start();
?>

<!DOCTYPE html>

<html lang="it">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="icon" href="imgs/logo_fauser.png">
    <title>Home</title>

    <style type="text/css">
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        .row {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>



<!-- Navbar: barra di navigazione -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">TradeForYou</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <?php if (!isset($_SESSION["id"]) || !isset($_SESSION["ruolo"])) {?>
                <li class='nav-item'>
                    <a class='nav-link' href='login.php'>Login</a>
                </li>
                <?php } else {?>
                <li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Logout</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>



<main>
    <div class="container">



        <!-- div per generazione degli errori -->
        <div></div>



        <div class="row"><h1 style="margin-top: 20px">Homepage</h1></div>

        <?php
        if (isset($_SESSION["id"]) && isset($_SESSION["ruolo"])) {
            echo '<div class="row">';
            echo '<div class="col-6">';
            echo '<p>Benvenuto ' . $_SESSION["nome"] . ' ' . $_SESSION["cognome"] . '</p>';
            echo '</div>';
            echo '</div>';
        }
        ?>

        <div class="row">
            <div class="col-6">
                <div class="list-group">
                    <a href="richieste/query_1.php" class="list-group-item list-group-item-action">Query 1</a>
                    <a href="richieste/query_2.php" class="list-group-item list-group-item-action">Query 2</a>
                    <a href="richieste/form.php" class="list-group-item list-group-item-action">Form</a>
                </div>
            </div>
        </div>

    </div>
</main>



<footer class="bg-dark text-light text-lg-start">
    <div class="container p-4">
        <div class="row">
            <div class="col-8">
                <h5 class="text-uppercase">Informazioni</h5>
                <p>
                    Sito realizzato a scopo didattico dallo studente <b>Hu Yanhui Matteo</b> della classe <b>5^BIN</b>
                    durante l'anno scolastico 2020/2021 dell'<b>Istituto Tecnico Tecnologico G. Fauser</b>.
                </p>
            </div>

            <div class="col-4">
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled">
                    <li><a class="link-light" href="https://www.fauser.edu/">Istituto Fauser</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>