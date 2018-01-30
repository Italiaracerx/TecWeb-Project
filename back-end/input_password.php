<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
$user=$_SESSION["cod"];

include("connessione_db.php")
$motto=$_POST['testo_motto'];
$descrizione=$_POST['testo_descrizione']

$query="UPDATE 'accountNegozi' SET 'password'='$nuova_password' WHERE'username'='user';";
mysqli_query($connessione, $query);
mysqli_close($connessione);

echo '<script language=javascript>document.location.href="generale_private.php"</script>';