<!--
            Cognome: Hu
               Nome: Matteo Yanhui
          Matricola: 11519
             Classe: 5^BIN
    Anno scolastico: 2020/2021

          Nome file: login.php
    Ultima modifica: 29/05/2021
-->

<?php
// Controllo se l'utente ha già effettuato l'accesso
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["ruolo"])) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>

<html lang="it">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="icon" href="imgs/logo_fauser.png">
    <title>Login</title>

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
        <a class="navbar-brand" href="index.php">TradeForYou</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="tabelle.php">Tabelle</a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link active' aria-current="page" href='#'>Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<main>
    <div class="container">



        <!-- div per generazione degli errori -->
        <div></div>



        <div class="row">
            <div class="col-6">
                <h1 style="margin-top: 20px">Utente</h1>
                <!-- Form di login clienti -->
                <form method="post" action="elabora_login.php">
                    <!-- Input hidden che specifica chi si sta loggando (cliente oppure operatore) -->
                    <input type="hidden" name="tipologin" value="cliente">

                    <div class="row">
                        <div class="col-8">
                            <label for="userlogin" class="form-label">Username / Email</label>
                            <input id="userlogin" class="form-control" name="userlogin" type="text" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <label for="userpassword" class="form-label">Password</label>
                            <input id="userpassword" class="form-control" name="userpassword" type="password" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <input type="submit" name="submit" class="btn btn-primary" value="Accedi">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-6">
                <h1 style="margin-top: 20px">Operatore</h1>
                <!-- Form di login operatori -->
                <form method="post" action="elabora_login.php">
                    <!-- Input hidden che specifica chi si sta loggando (cliente oppure operatore) -->
                    <input type="hidden" name="tipologin" value="operatore">

                    <div class="row">
                        <div class="col-8">
                            <label for="oplogin" class="form-label">Username / Email</label>
                            <input id="oplogin" class="form-control" name="oplogin" type="text" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <label for="oppassword" class="form-label">Password</label>
                            <input id="oppassword" class="form-control" name="oppassword" type="password" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <input type="submit" name="submit" class="btn btn-primary" value="Accedi">
                        </div>
                    </div>
                </form>
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