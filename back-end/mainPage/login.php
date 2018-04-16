<?php
    require_once __DIR__.'\..\class\sistema\controller.php';
    require_once __DIR__.'\..\class\pagine\loginPage.php';
    require_once __DIR__.'\..\class\pagine\page_private.php';


    $controller = new controller(new page_private(new loginPage()));
    $controller->printHTML();
?>
