<?php
    require_once('../class/sistema/controller.php');
    require_once('../class/pagine/adminPage.php');

    $controller = new controller(new adminPage());
    $controller->check_session();
    $controller->printHTML();
?>
