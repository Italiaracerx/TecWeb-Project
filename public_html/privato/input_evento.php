<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
include("connessione_db.php");
$newdescrizione=$_POST['descrizione'];

$query="INSERT INTO eventi (descrizione) VALUES ('$newdescrizione')";
mysqli_query($connessione, $query);
mysqli_close($connessione);


header("location: /darossi/privato/generale_admin.php"); exit();
?>
