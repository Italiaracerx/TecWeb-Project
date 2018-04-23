<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/contacts_changer.php';

	$infos=new infos_changer($_SESSION['user'],$_POST['telefono'], $_POST['Email'], $_POST['Sito_web']);
	$controller = new controller_query($infos);
	$controller->update_contacts();
?>
