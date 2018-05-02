<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_public.php';
    require_once __DIR__.'/../../class/query/log.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->head();
?>
<div id="content"><!--NEGOZI-->
    
    <div class="vetrina">
    	<a href="lego.html">
            <img src="images/imglego.jpg" alt="Logo negozio Lego"/>
        </a>
        <h5 class="NomeItem">LEGO STORE</h5>

    </div>
    
        <div class="vetrina">
    	<a href="armani.html">
			<img src="images/imgarmani.jpg" alt="Logo negozio armani" />
        </a>
        <h5 class="NomeItem">LEGO STORE</h5>

        </div>


        <div class="vetrina">
        <a href="trony.html">
            <img src="images/imgtrony.jpg" alt="Logo negozio Trony"/>
        </a>
        <h5 class="NomeItem">LEGO STORE</h5>

        </div>


        <div class="vetrina">
    	<a href="lego.html">
    	<img src="images/imglego.jpg" alt="Logo negozio Lego"/>
        </a>
        <h5 class="NomeItem">LEGO STORE</h5>

    </div>
        
        
       <div class="vetrina">
    	<a href="lego.html">
    	<img src="images/imglego.jpg" alt="Logo negozio Lego"/>
        </a>
        <h5 class="NomeItem">LEGO STORE</h5>

    </div>
             
        
</div><!--fine NEGOZI-->

<?php
$controller->footer();
?>
