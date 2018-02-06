<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
//include("config.php");
include("connessione_db.php");
  
//variabili POST con anti sql Injection
$username=mysqli_real_escape_string($connessione,$_POST['username']); //faccio l'escape dei caratteri dannosi
$password=mysqli_real_escape_string($connessione,$_POST['password']); //sha1 cifra la password anche qui in questo modo corrisponde con quella del db
 
 $query = " SELECT * FROM accountNegozi WHERE username = '$username' AND password = '$password' ";
 $ris = mysqli_query($connessione,$query) or die (mysqli_error($connessione));
 $riga=mysqli_fetch_array($ris);  
 
/*Prelevo l'identificativo dell'utente */
$cod=$riga['username'];
 
/* Effettuo il controllo */
if ($cod == NULL) $trovato = 0 ;
else $trovato = 1;
 
/* Username e password corrette */
if($trovato == 1) {
 /*Registro la sessione*/ 
  $_SESSION["autorizzato"] = 1;
 
  /*Registro il codice dell'utente*/
  $_SESSION['cod'] = $cod;
 
/*Redirect alla pagina riservata*/
if($cod == "admin"){
 	echo '<script language=javascript>document.location.href="generale_admin.php"</script>';
}
else{	
 	echo '<script language=javascript>document.location.href="generale_private.php"</script>';
} 
} else {
 
/*Username e password errati, redirect alla pagina di login*/
	echo '<script language=javascript>document.location.href="login.php"</script>';
 
}

$connessione->mysql_close();
?>