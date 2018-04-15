<?php
    require_once __DIR__.'\..\class\sistema\controller.php';
    require_once __DIR__.'\..\class\pagine\adminPage.php';

    $controller = new controller(new adminPage());
    $controller->check_session();
    $controller->printHTML();

?>
