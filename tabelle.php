<!--
            Cognome: Hu
               Nome: Matteo Yanhui
          Matricola: 11519
             Classe: 5^BIN
    Anno scolastico: 2020/2021

          Nome file: tabelle.php
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
                    <a class="nav-link active" aria-current="page" href="#">Tabelle</a>
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

<?php
// Includo i dati di configurazione del database
include 'config/config.php';

// Connessione al database
$connessione = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($connessione === false)
    die("Connection failed: " . $connessione->connect_error);
?>

<main>
    <div class="container">

        <div class="row"><h1 style="margin-top: 20px">Tabelle</h1></div>

        <!-- Visualizzazione tabella Operatori -->
        <div class="row">
            <div class="col-8">
                <h4>
                    Tabella Operatori
                </h4>
            </div>
        </div>

        <?php
        $query = "SELECT * FROM operatori";
        $ris = mysqli_query($connessione, $query);
        ?>
        <div class="row">
            <div class="col-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data nascita</th>
                        <th scope="col">Email</th>
                        <th scope="col">Salt</th>
                        <th scope="col">Password Criptata</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    // Stampa degli elementi della query in una tabella
                    while ($row = $ris->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row["idOperatore"] . "</th>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["cognome"] . "</td>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["dataNascita"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["salt"] . "</td>";
                        echo "<td>" . $row["password_hash"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Visualizzazione tabella Clienti -->
        <div class="row">
            <div class="col-8">
                <h4>
                    Tabella Clienti
                </h4>
            </div>
        </div>

        <?php
        $query = "SELECT * FROM clienti";
        $ris = mysqli_query($connessione, $query);
        ?>
        <div class="row">
            <div class="col-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data nascita</th>
                        <th scope="col">Email</th>
                        <th scope="col">Salt</th>
                        <th scope="col">Password Criptata</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    // Stampa degli elementi della query in una tabella
                    while ($row = $ris->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row["idCliente"] . "</th>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["cognome"] . "</td>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["dataNascita"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["salt"] . "</td>";
                        echo "<td>" . $row["password_hash"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Visualizzazione tabella Operazioni -->
        <div class="row">
            <div class="col-8">
                <h4>
                    Tabella Operazioni
                </h4>
            </div>
        </div>

        <?php
        $query = "SELECT * FROM operazioni";
        $ris = mysqli_query($connessione, $query);
        ?>
        <div class="row">
            <div class="col-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ora</th>
                        <th scope="col">Importo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">ID Operatore</th>
                        <th scope="col">ID Cliente</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    // Stampa degli elementi della query in una tabella
                    while ($row = $ris->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row["idOperazione"] . "</th>";
                        echo "<td>" . $row["data"] . "</td>";
                        echo "<td>" . $row["ora"] . "</td>";
                        echo "<td>" . $row["importo"] . "</td>";
                        echo "<td>" . $row["descrizione"] . "</td>";
                        echo "<td>" . $row["fk_idOperatore"] . "</td>";
                        echo "<td>" . $row["fk_idCliente"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Visualizzazione tabella Operatori -->
        <div class="row">
            <div class="col-8">
                <h4>
                    Tabella Campagne
                </h4>
            </div>
        </div>

        <?php
        $query = "SELECT * FROM campagne";
        $ris = mysqli_query($connessione, $query);
        ?>
        <div class="row">
            <div class="col-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Data scadenza</th>
                        <th scope="col">Budget</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    // Stampa degli elementi della query in una tabella
                    while ($row = $ris->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row["idCampagna"] . "</th>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["descrizione"] . "</td>";
                        echo "<td>" . $row["dataScadenza"] . "</td>";
                        echo "<td>" . $row["budget"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Visualizzazione tabella Invia -->
        <div class="row">
            <div class="col-8">
                <h4>
                    Tabella Invia
                </h4>
            </div>
        </div>

        <?php
        $query = "SELECT * FROM invia";
        $ris = mysqli_query($connessione, $query);
        ?>
        <div class="row">
            <div class="col-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ID Operatore</th>
                        <th scope="col">ID Cliente</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    // Stampa degli elementi della query in una tabella
                    while ($row = $ris->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row["idInvia"] . "</th>";
                        echo "<td>" . $row["fk_idCampagna "] . "</td>";
                        echo "<td>" . $row["fk_idCliente "] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
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