<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/log.php';

	$log =new login($_SESSION['user'],$_POST['password'],$_POST['Password_1']);
	$controller = new controller_query($log);
	$controller->update();
?>
