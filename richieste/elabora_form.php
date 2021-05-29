<?php
/*
 *          Cognome: Hu
 *             Nome: Matteo Yanhui
 *        Matricola: 11519
 *           Classe: 5^BIN
 *  Anno scolastico: 2020/2021
 *
 *        Nome file: elabora_form.php
 *  Ultima modifica: 29/05/2021
 */

// Controllo se è stato utilizzato il form (form.php)
if (!isset($_POST["submit"]) || !isset($_POST["nome"]) || !isset($_POST["descrizione"]) ||
    !isset($_POST["datascadenza"]) || !isset($_POST["budget"])) {
    header("location: form.php");
    exit();
}

$nome = $_POST["nome"];
$descrizione = $_POST["descrizione"];
$datascadenza = $_POST["datascadenza"];
$budget = $_POST["budget"];

// Includo i dati di configurazione del database
include '../config/config.php';

// Connessione al database
$connessione = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($connessione === false)
    die("Connection failed: " . $connessione->connect_error);

// Inserisco nel database i dati inseriti nel form
$query = $connessione->prepare("CALL newCampagna(?, ?, ?, ?)");
$query->bind_param("sssd", $nome, $descrizione, $datascadenza, $budget);

// Controllo esito dell'inserimento nel database
if ($query->execute()) {
    // Esito positivo
    header("Location: form.php");
    exit();
} else {
    // Esito negativo
    header("Location: form.php");
    exit();
}
?>