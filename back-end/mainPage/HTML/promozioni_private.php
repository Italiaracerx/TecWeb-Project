<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_private.php';
    require_once __DIR__.'/../../class/query/image.php';
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
              <form action="../mainForm/insertPromozione.php" method="post" enctype="multipart/form-data">
                  <div>

                      <label for="nome_prodotto">Nome:</label>
                  <input type="text" name="nome" id="nome_prodotto"  />

                    <label for="campo_alt">Alternativa testuale dell'immagine della promozione:</label>
                    <input type="text" name="alt" id="campo_alt" />

                    <label for="data">Data Inizio :</label>
                    <input type="text" name="start" id="data" /> 

                    <label for="data">Data Fine :</label>
                    <input type="text" name="finish" id="data" /> 

                    <label for="descrizione_promozione">Descrizione promozione:</label>
                    <textarea name="description" id="descrizione_promozione" rows="10" cols="30" ></textarea>


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
                  <?php 
                    $promozioni =new image('promozione',$_SESSION['user']);
                    $result_pro =$promozioni->read();
                    $rows =array();
                    while($row = $result_pro->fetch_array(MYSQLI_ASSOC)){
                      $rows[] = $row;
                    }
                    if(!count($rows)){
                      echo '                <div class ="no_image">
                    <p class="text_message">coming soon</p>
                </div>
';
                    }
                    else{
                      foreach($rows as $row){
                            echo '<div class="imgPromozione">
                          <img class="promozione" src="images/promozione/'.$row['source'].'" alt="'.$row['alt'].'"/> 
                          </div>';
                      }
                    }
                  ?>
            </div>            
        </div>
        <div class="form_sopra">
              <p class="intestazione">ELIMINA PROMOZIONI</p> 
              <div id="controllo_eliminaNeg"></div>
              <form  action="../mainForm/deletePromozione.php" method="post" onsubmit="return validateUser()">
                <div>
                  <label for="elimina_negozio">Nome Negozio:</label>
                  <select name="titolo" id="elimina_negozio">
                  <option value="Cerca nel menu:">Cerca nel menu:</option>
                  <?php 
                      foreach($rows as $row){
                      echo '<option value="'.$row['titolo'].'">'.$row['titolo'].'</option>';
                    }
                  ?>
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
