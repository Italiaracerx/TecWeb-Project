<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/image.php';

	$controller = new controller_query();
	$promozione =new image('promozione');
	$controller->setQuery($promozione);
	$controller->delete();
?>
