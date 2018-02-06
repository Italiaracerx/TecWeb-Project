<?php
// Inizializza la sessione.
// Se state usando session_name("qualcosa"), non dimenticatevelo adesso!
session_start();
// Desetta tutte le variabili di sessione.
session_unset();
// Infine , distrugge la sessione.
session_destroy(); 

echo '<script language=javascript>document.location.href="login.php"</script>';
//echo '<script language=javascript>document.location.href="../privato/login.php"</script>';

?>