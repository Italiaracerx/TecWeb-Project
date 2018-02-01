<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
//include("config.php");
$user= $_SESSION["cod"];

include("connessione_db.php");
$primo; 
$secondo;
$terzo;
//variabili POST con anti sql Injection
$primo=$_POST['feriale'];
$secondo=$_POST['sabato']; 
$terzo=$_POST['festivi']; 

 
$query="UPDATE `orario` SET `feriale` = '$primo', `sabato` = '$secondo', `festivi` = '$terzo' WHERE `username` = '$user'";
mysqli_query($connessione,$query);
mysqli_close($connessione);

echo '<script language=javascript>document.location.href="admin.php"</script>';

?>
