<?php
/*
 *          Cognome: Hu
 *             Nome: Matteo Yanhui
 *        Matricola: 11519
 *           Classe: 5^BIN
 *  Anno scolastico: 2020/2021
 *
 *        Nome file: elabora_login.php
 *  Ultima modifica: 29/05/2021
 */

// Controllo se l'utente ha già effettuato l'accesso
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["ruolo"])) {
    header("location: index.php");
    exit();
}

// Controllo se è stato utilizzato il form di accesso (login.php)
if (!isset($_POST["submit"]) || !isset($_POST["tipologin"])) {
    header("location: login.php");
    exit();
}

// Controllo il tipo di login utilizzato
switch ($_POST["tipologin"]) {
    case 'cliente':
        $target = "clienti";
        $username = htmlspecialchars($_POST["userlogin"]);
        $password = htmlspecialchars($_POST["userpassword"]);
        $id = "idCliente";
        break;
    case 'operatore':
        $target = "operatori";
        $username = htmlspecialchars($_POST["oplogin"]);
        $password = htmlspecialchars($_POST["oppassword"]);
        $id = "idOperatore";
        break;
    default:
        // In caso di errore di inserimento dei dati l'utente verrà riportato al form di login
        header("location: login.php");
        exit();
}

// Includo i dati di configurazione del database
include 'config/config.php';

// Connessione al database
$connessione = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($connessione === false)
    die("Connection failed: " . $connessione->connect_error);

// Controllo i dati inseriti dall'utente
$query = $connessione->prepare("SELECT * FROM ? WHERE username = ? AND SHA2(CONCAT(salt, ?), 256) = password_hash");
$query->bind_param("sss", $target, $username, $password);
$query->execute();
$risultato = $query->get_result();
if ($dato = $risultato->fetch_assoc()) {
    $_SESSION["id"] = $dato[$id];
    $_SESSION["ruolo"] = htmlspecialchars($_POST["tipologin"]);
    $_SESSION["cognome"] = htmlspecialchars($dato["cognome"]);
    $_SESSION["nome"] = htmlspecialchars($dato["nome"]);
    // Esito positivo: porto l'utente alla homepage
    header("Location: index.php");
    exit();
} else {
    // Esito negativo: riporto l'utente al form di login
    header("Location: login.php");
    exit();
}
?>