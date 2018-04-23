<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/shop_description_changer.php';

	$newname=new shop_slogan_changer($_SESSION['user'], $_POST['testo_motto'], $_POST['testo_descrizione']);
	$controller = new controller_query($newname);
	$controller->update_shop_slogan();
?>
