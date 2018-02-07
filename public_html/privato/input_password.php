<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
$user=$_SESSION['cod'];
include("connessione_db.php");
$nuova_password=$_POST['password'];

$query="UPDATE accountNegozi SET password='$nuova_password' WHERE username='$user';";
mysqli_query($connessione, $query);
mysqli_close($connessione);

if($user == "admin"){
	header("location: /darossi/privato/generale_admin.php"); exit();
}
else{
	header("location: /darossi/privato/generale_private.php"); exit();
	}
?>
