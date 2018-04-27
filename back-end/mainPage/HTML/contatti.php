<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_public.php';
    require_once __DIR__.'/../../class/query/log.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_public('Contatti',(new menu((new staticPath())->public_menu('3')))));
    $controller->head();
?>
    <div id="content">
        <h2 id="intestazione">Comunicazione diretta con il Centro</h2>
        <img id="fotoContatti" src="images/ArchimedeEsterno.jpg" alt="Foto del Centro Archimede" />
        <div id="testoInformazioni">
    	<h3>Centro Archimede</h3>
    	<p> Indirizzo: Via Trieste, 63 - 35121 Padova <span xml:lang="en">(Italy)</span></p>
    	<p>Tel: +39 049 827 1200</p>
        <p>Fax: +39 049 827 1499</p>
    	<p><span xml:lang="en">E-Mail</span>Direzione: info@centro.archimede.it</p>
        </div>
        
    </div>

<?php
$controller->footer();
?>