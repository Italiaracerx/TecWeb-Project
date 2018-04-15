<?php
    require_once __DIR__.'\..\class\sistema\controller.php';
    require_once __DIR__.'\..\class\pagine\loginPage.php';

    $controller = new controller(new loginPage());
    $controller->printHTML();
?>
