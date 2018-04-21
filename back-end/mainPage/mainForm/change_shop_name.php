<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/shop_name_changer.php';

	$newname=new shop_name_changer($_SESSION['user'], $_POST['nome_negozio']);
	$controller = new controller_query($newname);
	$controller->update_shop_name();
?>
