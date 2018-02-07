<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
$user=$_SESSION["cod"];

include("connessione_db.php");
$mod=$_POST['campo'];

$query="UPDATE info SET negozio='$mod' WHERE username='$user';";
mysqli_query($connessione, $query);
mysqli_close($connessione);


header("location: /darossi/privato/generale_private.php"); exit();
?>