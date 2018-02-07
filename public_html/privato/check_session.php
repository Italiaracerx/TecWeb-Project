<?php
session_start();
if (!$_SESSION["autorizzato"]) {
  	header("location: /darossi/privato/login.php"); exit();
  die;
}
?>