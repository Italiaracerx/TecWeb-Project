<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/logo.php';

	$controller = new controller_query();
	$logo =new logo();
	$controller->setQuery($logo);
	$controller->write();
?>
