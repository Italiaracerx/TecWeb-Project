<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_prodpromo_public.php';

    $controller = new controller();
    $prodpromo = new prodpromo_public();
    $controller->setPage($prodpromo);

    $controller->head();
    $prodpromo->content();
    $controller->footer();
?>
