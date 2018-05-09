<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_public.php';
    require_once __DIR__.'/../../class/query/orario.php';
    require_once __DIR__.'/../../class/query/image.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_public('home',(new menu((new staticPath())->public_menu('0')))));
    $controller->head();
?>
  <div id="content">
    <img id="torre" alt="immagine torre archimede" src="images/default/torre 2.jpg"/>

    <h2  id="intestazione">Benvenuti nel Centro Commerciale Archimede</h2>
    <div id="eventi_promozioni">
    <div id="tabellaLaterale">
      <div id="tabella_orari">
            <h4 class="informazione">ORARI</h4>
            <?php
                $orario =new orario('admin');
                $giorni = array();
                $giorni =$orario->getGiorniHTML();
                $result_orario =$orario->read()->fetch_array(MYSQLI_NUM);
                
                for($i =0; $i < 7 ; $i ++){
                    echo '<p class="dato"><strong>'.$giorni[$i].':</strong>'.$result_orario[$i].'</p>';
                }
            ?>  
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
        <?php
            $promozione = new image('promozione');
            $result_promozione =$promozione->read();
                    $rows =array();
                    while($row = $result_promozione->fetch_array(MYSQLI_ASSOC)){
                        $rows[] = $row;
                    }
                    if(!count($rows)){
                        echo '                
                        <div class ="no_image">
                            <p class="text_message">coming soon</p>
                        </div>';
                    }
                    else{
                        echo '<div id="elencoPromozioni">';
                        foreach($rows as $row){
                            echo '
                            <div class="singola_promozione">
                                <a href="promo2.html">
                                    <img class="promozione" src="images/promozione/'.$row['source'].'" alt="'.$row['alt'].'"/>
                                </a> 
                                <p>'.$row['negozio'].'</p>
                            </div>';
                        }
                        echo '  </div>';
                    }
        ?>

      </div>
     </div>

    
    
  </div>

<?php
$controller->footer();
?>
