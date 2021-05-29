<!--
            Cognome: Hu
               Nome: Matteo Yanhui
          Matricola: 11519
             Classe: 5^BIN
    Anno scolastico: 2020/2021

          Nome file: form.php
    Ultima modifica: 29/05/2021
-->

<?php

?>

<!DOCTYPE html>

<html lang="it">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="icon" href="imgs/">
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
        <a class="navbar-brand" href="../index.php">TradeForYou</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link' href='../login.php'>Login</a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link' href='../logout.php'>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<main>
    <div class="container">


        <!-- div per generazione degli errori -->
        <div></div>


        <div class="row"><h1 style="margin-top: 20px">Registrazione nuova campagna pubblicitaria</h1></div>

        <div class="row">
            <div class="col-8">
                <form method="post" action="elabora_form.php">
                    <div class="mb-3 row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control" id="nome" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="descrizione" class="col-sm-2 col-form-label">Descrizione</label>
                        <div class="col-sm-10">
                            <input type="textarea" name="descrizione" class="form-control" id="descrizione" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="datascadenza" class="col-sm-2 col-form-label">Data scadenza</label>
                        <div class="col-sm-10">
                            <input type="date" name="datascadenza" class="form-control" id="datascadenza" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="budget" class="col-sm-2 col-form-label">Budget</label>
                        <div class="col-sm-10">
                            <input type="number" min="0.01" max="99999.99" step="any" name="budget" class="form-control"
                                   id="budget" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-primary" name="submit" class="form-control"
                                   value="Registra">
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


<script type="text/javascript">
    // Imposto come data minima oggi
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; // Gennaio equivale a 0
    var yyyy = today.getFullYear();
    if (dd < 10)
        dd = '0' + dd
    if (mm < 10)
        mm = '0' + mm

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("datascadenza").setAttribute("min", today);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>