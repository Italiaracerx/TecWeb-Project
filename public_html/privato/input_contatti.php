<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
$user=$_SESSION["cod"];//"Ciccio78";
include("connessione_db.php");
$Telefono=$_POST['Telefono'];
$Email=$_POST['Email'];
$Sito_web=$_POST['Sito_web'];

$query="UPDATE info SET telefono='$Telefono', mail='$Email', sito='$Sito_web' WHERE username='$user';";
mysqli_query($connessione, $query);
mysqli_close($connessione);


header("location: /darossi/privato/generale_private.php"); exit();
?>