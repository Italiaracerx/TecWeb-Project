<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_public.php';
    require_once __DIR__.'/../../class/query/log.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_public('Generale',(new menu((new staticPath())->public_menu('0')))));
    $controller->head();
?>
  <div id="content">
    <img id="torre" alt="immagine torre archimede" src="images/torre 2.jpg"/>

    <h2  id="intestazione">Benvenuti nel Centro Commerciale Archimede</h2>
    <div id="eventi_promozioni">
    <div id="tabellaLaterale">
      <div id="tabella_orari">
                        <h4 class="informazione">ORARI</h4>
                        <p class="dato"><strong>Lunedì :</strong> 9:00 - 21:00</p>
                        <p class="dato"><strong>Martedì:</strong>  9:00 - 21:00</p>
                        <p class="dato"><strong>Mercoledì :</strong>  9:00 - 21:00</p>
                        <p class="dato"><strong>Giovedì :</strong>  9:00 - 21:00</p>
                        <p class="dato"><strong>Venerdì:</strong>  9:00 - 21:00</p>
                        <p class="dato"><strong>Sabato :</strong>  9:00 - 21:00</p>
                        <p class="dato"><strong>Domenica :</strong>  9:00 - 21:00</p>
                            
            </div>

      <div id="aperture">
        <h4>Aperture/Chiusure Straordinare</h4>
        <p>Aperti primo maggio con orario continuato</p>
      </div>

      <div id="novità">
        <h4>Novità</h4>
        <p>13/05/2018 Apertura nuovo  negozio di abbigliamento Forpen </p>
      </div>

        </div>

    <div id="sottoPiano">
      <div id="tre_pulsanti">
       <p class="casella"><a href="negozi.html">Negozi</a></p>
       <p class="casella"><a href="negozi.html">Dove Siamo</a></p>
       <p class="casella"><a href="negozi.html">Contatti</a></p>
        </div>
       <div id="titolo_promozione">
        <h2>Promozioni</h2>
       </div>
        <div id="elencoPromozioni">
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
     </div>

    
    
  </div>

<?php
$controller->footer();
?>
