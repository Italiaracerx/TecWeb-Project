<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_private.php';
    require_once __DIR__.'/../../class/query/log.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_private('Promozioni',(new menu((new staticPath())->user('1'))), 'general_private'));
    $controller->check_session();
    $controller->head();
?>
    <div id="content">
        <div id="content_promozioni">
            <div id="colonna_sinistra">
              
                    <p class="intestazione">NUOVA PROMOZIONE</p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                          <label for="campo_alt">Alternativa testuale dell'immagine della promozione:</label>
                          <input type="text" name="campo_alt" id="campo_alt"/>

                          <label for="descrizione_promozione">Descrizione promozione:</label>
                          <textarea name="descrizione_promozione" id="descrizione_promozione" rows="10" cols="30" ></textarea>

                          <label for="seleziona_promozione">Seleziona la promozione da inserire:</label>
                          <input type="file" name="immagine" id="seleziona_promozione"/>

                          <div class="invia">
                          <input type="submit" value="Salva"/>  
                          </div>
                         </div>                                                      
                    </form>
               
            </div>

            <div id="colonna_destra">
                <p class="intestazione">PROMOZIONI CORRENTI</p>
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo1.jpg" alt="promozione"/> 
                </div>
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo2.jpg" alt="promozione"/> 
                </div>
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo3.png" alt="promozione"/> 
                </div>
            </div>            
        </div>
    </div>
<?php
$controller->footer();
?>
