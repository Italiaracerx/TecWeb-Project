<?php
	require_once("class/controller.php");
	require_once("class/log.php");

	$controller = new controller_query(new log($_POST['username'],$_POST['password']));
	$controller->login();

?>