<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
$user=$_SESSION["cod"];

include("connessione_db.php");
$lunedi=$_POST['lunedi'];
$martedi=$_POST['martedi'];
$mercoledi=$_POST['mercoledi'];
$giovedi=$_POST['giovedi'];
$venerdi=$_POST['venerdi'];
$sabato=$_POST['sabato'];
$domenica=$_POST['domenica'];

$query="UPDATE orario SET lunedi='$lunedi', martedi='$martedi', mercoledi='$mercoledi', giovedi='$giovedi', venerdi='$venerdi', sabato='$sabato', domenica='$domenica' WHERE username='$user';";
mysqli_query($connessione, $query);
mysqli_close($connessione);

echo '<script language=javascript>document.location.href="generale_private.php"</script>';