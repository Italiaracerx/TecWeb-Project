<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_public.php';
    require_once __DIR__.'/../../class/query/log.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_public('Promozioni',(new menu((new staticPath())->public_menu('4')))));
    $controller->head();
?>
    <div id="content">
        <h2 id="intestazione">PROMOZIONI CORRENTI</h2>
        <div id="PromozioniAttive">
                <div class="promozioneHome">
                    <img class="promozione" src="images/promo1.jpg" alt="promozione"/> 
                    <p>Nome_Negozio_1</p>
                </div>
                <div class="promozioneHome">
                    <img class="promozione" src="images/promo2.jpg" alt="promozione"/> 
                    <p>Nome_Negozio_2</p>
                </div>
                <div class="promozioneHome">
                    <img class="promozione" src="images/promo3.png" alt="promozione"/> 
                    <p>Nome_Negozio_3</p>
                </div>
                <div class="promozioneHome">
                    <img class="promozione" src="images/promo1.jpg" alt="promozione"/> 
                    <p>Nome_Negozio_4</p>
                </div>
                <div class="promozioneHome">
                    <img class="promozione" src="images/promo1.jpg" alt="promozione"/> 
                    <p>Nome_Negozio_4</p>
                </div>
                
        </div>    
    </div>
    

<?php
$controller->footer();
?>
