<?php
session_start();
if (!$_SESSION["autorizzato"]) {
  	echo '<script language=javascript>document.location.href="../pubblico/login.php"</script>';
  die;
}
?>