<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
//include("config.php");
$user= $_SESSION["cod"];

include("connessione_db.php");

//variabili POST con anti sql Injection
$username=$_POST['username'];
$password=$_POST['password']; 
 
$query="INSERT INTO `accountNegozi` VALUES('$username','$password')";
mysqli_query($connessione,$query);
mysqli_close($connessione);

echo '<script language=javascript>document.location.href="generale_admin.php"</script>';

?>