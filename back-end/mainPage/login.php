<?php
    require_once('../class/sistema/controller.php');
    require_once('../class/pagine/loginPage.php');

    $controller = new controller(new loginPage());
    $controller->check_session();
    $controller->printHTML();
?>
