<?php
/*
 *          Cognome: Hu
 *             Nome: Matteo Yanhui
 *        Matricola: 11519
 *           Classe: 5^BIN
 *  Anno scolastico: 2020/2021
 *
 *        Nome file: logout.php
 *  Ultima modifica: 29/05/2021
 */

session_start();
$_SESSION = array();
session_destroy();
header("location: login.php");
exit;
?>