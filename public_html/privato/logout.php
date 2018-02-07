<?php
// Inizializza la sessione.
// Se state usando session_name("qualcosa"), non dimenticatevelo adesso!
session_start();
// Desetta tutte le variabili di sessione.
session_unset();
// Infine , distrugge la sessione.
session_destroy(); 
header("location: /darossi/privato/login.php"); exit();


?>