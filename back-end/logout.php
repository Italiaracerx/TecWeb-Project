<?php
// Inizializza la sessione.
// Se state usando session_name("qualcosa"), non dimenticatevelo adesso!
session_start();
// Desetta tutte le variabili di sessione.
session_unset();
// Infine , distrugge la sessione.
session_destroy(); 
session_start();
include('config_session.php');
$_SESSION['flag']=1;
$_SESSION['flag_text']="Logout effettuato con successo.";
header("Location: login.php");

?>