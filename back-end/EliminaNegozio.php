<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
//include("config.php");
//con javascript dobbiamo impedire di eliminare l'account admin e verificare se esiste l'accont con il nome selezionato
$user= $_SESSION["cod"];

include("connessione_db.php");

//variabili POST con anti sql Injection
$negozio=$_POST['negozio'];
 
$query=" DELETE FROM `accountNegozi` WHERE `username` = '$negozio'";
mysqli_query($connessione,$query);
mysqli_close($connessione);

echo '<script language=javascript>document.location.href="admin.php"</script>';

?>