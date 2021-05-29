<!--
            Cognome: Hu
               Nome: Matteo Yanhui
          Matricola: 11519
             Classe: 5^BIN
    Anno scolastico: 2020/2021

          Nome file: query_1.php
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

    <link rel="icon" href="../imgs/logo_fauser.png">
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

                <li class="nav-item">
                    <a class="nav-link" href="../tabelle.php">Tabelle</a>
                </li>

                <?php if (!isset($_SESSION["id"]) || !isset($_SESSION["ruolo"])) {?>
                    <li class='nav-item'>
                        <a class='nav-link' href='../login.php'>Login</a>
                    </li>
                <?php } else {?>
                    <li class='nav-item'>
                        <a class='nav-link' href='../logout.php'>Logout</a>
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


        <div class="row"><h1 style="margin-top: 20px">Query 1</h1></div>

        <!-- Consegna della query -->
        <div class="row">
            <div class="col-8">
                <h4>Dato il codice di un cliente, visualizzare date e importi degli investimenti effettuati
                    nell’ultimo mese</h4>
            </div>
        </div>

        <!-- SQL -->
        <div class="row">
            <div class="col-6">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header">Query</div>
                    <div class="card-body">
                        <p class="card-text">
                            SELECT data, importo<br>
                            FROM operazioni<br>
                            WHERE fk_idCliente = $input_idCliente AND<br>
                            EXTRACT(MONTH FROM data) = EXTRACT(MONTH FROM CURRENT_TIMESTAMP) AND<br>
                            EXTRACT(YEAR FROM data) = EXTRACT(YEAR FROM CURRENT_TIMESTAMP);<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form per acquisire il codice cliente -->
        <div class="row">
            <div class="col-8">
                <form action="" method="post">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="idCliente" class="col-form-label">ID Cliente</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" id="idCliente" class="form-control" name="idCliente">
                        </div>
                        <div class="col-auto">
                            <input class="btn btn-primary" type="submit" name="submit" value="Invia">
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <?php
        // Controllo che sia stato effettivamente inserito e inviato un codice numerico del cliente
        if (isset($_POST["submit"]) && isset($_POST["idCliente"]) && is_numeric($_POST["idCliente"])) {
        $input_idCliente = $_POST["idCliente"];

        // Includo i dati di configurazione del database
        include '../config/config.php';

        // Connessione al database
        $connessione = new mysqli($db_host, $db_username, $db_password, $db_name);
        if ($connessione === false)
            die("Connection failed: " . $connessione->connect_error);

        $query = "SELECT data, importo
                        FROM operazioni
                        WHERE fk_idCliente = $input_idCliente AND
                        EXTRACT(MONTH FROM data) = EXTRACT(MONTH FROM CURRENT_TIMESTAMP) AND
                        EXTRACT(YEAR FROM data) = EXTRACT(YEAR FROM CURRENT_TIMESTAMP)";
        $ris = mysqli_query($connessione, $query);
        ?>
        <div class="row">
            <div class="col-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Data</th>
                        <th scope="col">Importo</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    // Stampa degli elementi della query in una tabella
                    while ($row = $ris->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $input_idCliente . "</th>";
                        echo "<td>" . $row["data"] . "</td>";
                        echo "<td>" . $row["importo"] . "</td>";
                        echo "</tr>";
                    }
                    ?>

                    </tbody>
                </table>
                <?php
                }
                ?>
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