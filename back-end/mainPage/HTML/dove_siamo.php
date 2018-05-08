<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_public.php';
    require_once __DIR__.'/../../class/query/log.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_public('Dove siamo',(new menu((new staticPath())->public_menu('2')))));
    $controller->head();
?>
	<div id="content">
	   <h3 id="intestazione"> Come raggiungere il Centro Archimede</h3>
        <div id="doveandare">
        <img id="mappa" src="images/default/mappaArchimede.png" alt="mappa del centro"/>
        <div id="testoInformazioni">
			<h3>Dalla stazione ferroviaria:</h3>
			<p> si prende un autobus per via Tommaseo ("Fiera di Padova"), si scende di fronte alla "Fiera di Padova", si prende via U. Bassi (sulla destra al semaforo) e si cammina per circa 200m.</p>
			<h3>Dalla stazione degli autobus:</h3>
            <p>si esce dalla stazione, si gira a sinistra e poi immediatamente a destra al semaforo (via Trieste), si cammina lungo via Trieste per circa 300m.</p>
        </div>
       
        </div>
    </div>

<?php
$controller->footer();
?>
