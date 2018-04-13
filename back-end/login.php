<?php
    require_once('class/controller.php');
    require_once('class/page_template.php');

    $controller = new controller(new loginPage());
    $controller->check_session();
    $controller->printHTML();
?>
