<?php
	session_start();
	if ($_SESSION == NULL){
		include('config_session.php');
	}
    if($_SESSION['type'] == NULL){
		$_SESSION['flag']=2;
		$_SESSION['flag_text']="Sessione scaduta, esegui un nuovo login.";
		header("Location: login.php");
		die;
	}
?>