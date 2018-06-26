<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_negozi.php';


    $controller = new controller();
    $shop = new negozi();
    $controller->setPage($shop);

    $controller->head();
    $shop->content();
    $controller->footer();
?>
