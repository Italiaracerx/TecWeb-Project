<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_negozi.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $shop = new negozi(new menu((new staticPath())->public_menu('1')));
    $controller->setPage($shop);

    $controller->head();
    $shop->content();
    $controller->footer();
?>
