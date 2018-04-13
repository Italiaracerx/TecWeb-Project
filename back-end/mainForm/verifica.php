<?php
	require_once("../class/sistema/controller.php");
	require_once("../class/query/log.php");

	$controller = new controller_query(new log($_POST['username'],$_POST['password']));
	$controller->login();

?>