<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_private.php';
    require_once __DIR__.'/../../class/query/log.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_private('Prodotti',(new menu((new staticPath())->user('2'))), 'general_private'));
    $controller->check_session();
    $controller->head();
?>
    <div id="content">
        <div id="content_promozioni">
        <div id="colonna_sinistra">
                    <p class="intestazione">NUOVO PRODOTTO</p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                    	<label for="nome_prodotto">Nome:</label>
                        <input type="text" name="nome_prodotto" id="nome_prodotto" value="Star-Wars 75104" />

                        <label for="campo_alt">Alternativa testuale dell'immagine del prodotto:</label>
                        <input type="text" name="campo_alt" id="campo_alt"/>

                        <label for="descrizione_prodotto">Descrizione prodotto:</label>
                        <textarea name="descrizione_prodotto" id="descrizione_prodotto" rows="10" cols="30"></textarea>
                        
                        <label for="seleziona_promozione">Seleziona il prodotto da inserire:</label>
                        <input type="file" name="immagine" id="seleziona_promozione"/>
                        <div class="invia">
                        <input  type="submit" value="Salva"/>   
                        </div>

                       </div>                                                     
                    </form>
            </div>
            
            <div id="colonna_destra">
                <p class="intestazione">PRODOTTI CORRENTI</p>
                <div class="imgPromozione">
                    <img class="promozione" src="images/lego1.jpg" alt="promozione"/> 
                </div>
                <div class="imgPromozione">
                    <img class="promozione" src="images/lego2.jpg" alt="promozione"/> 
                </div>
                <div class="imgPromozione">
                    <img class="promozione" src="images/lego3.jpg" alt="promozione"/> 
                </div>
            </div>            
        </div>
        <div class="form_sopra">
              <p class="intestazione">ELIMINA PRODOTTI </p> 
              <div id="controllo_eliminaNeg"></div>
              <form  action="" method="post" onsubmit="return validateUser()">
                <div>
                  <label for="elimina_negozio">Nome Negozio:</label>
                  <select name="nelimina_negozio" id="elimina_negozio">
                  <option value="Cerca nel menu:">Cerca nel menu:</option>
                  <option value="volvo">Volvo</option>
                  <option value="saab">Saab</option>
                  <option value="opel">Opel</option>
                  <option value="audi">Audi</option>
                  </select>  
                  <div class="invia">                
                   <input type="reset"  name="tasto_reset"  value="Reset"/>  
                   <input type="submit" name="tasto_salva"  value="Salva"/>
                  </div>
                </div>
               </form>
            </div>
    </div>
<?php
$controller->footer();
?>
