<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
$user=$_SESSION["cod"];

include("connessione_db.php");
$descrizione=$_POST['testo_descrizione'];
$motto=$_POST['testo_motto'];

$query="UPDATE info SET descrizione='$descrizione', titolo='$motto' WHERE username='$user';";
mysqli_query($connessione, $query);
mysqli_close($connessione);


header("location: /darossi/privato/generale_private.php"); exit();
?>