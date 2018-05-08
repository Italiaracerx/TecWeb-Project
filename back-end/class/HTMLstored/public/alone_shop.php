<?php

require_once __DIR__.'../../query/orario.php';
require_once __DIR__.'../../query/logo.php';
require_once __DIR__.'../../query/image.php';


        $logo = new logo($_GET['shop']);
        $orario =new orario($_GET['shop']);

        $info ="SELECT * FROM info I WHERE I.username = '$this->name'";
        $prodotto ="SELECT * FROM immagini I WHERE I.username = '$this->name' AND I.type = 'prodotto'";
        $promozione ="SELECT * FROM immagini I WHERE I.username = '$this->name' AND I.type = 'promozione'";

        $info = parent::execute_query($info);
        $prodotto = parent::execute_query($prodotto);
        $promozione = parent::execute_query($promozione);

        $giorni = array();
        $giorni =$orario->getGiorniHTML();

        $result_logo =$logo->read()->fetch_array(MYSQLI_ASSOC);;
        $result_info = $info->fetch_array();
        $result_orario =$orario->read();


echo 
    '<div id="content_negozio">
        <h3 id="titolo_negozio">'.$result_info['negozio'].'</h3>';

echo   '<div id="informazioni">
            <img id="logo_negozio" src="images/logo/'.$result_logo['logo'].'" alt="'.$result_logo['alt'].'"/>
            <div id="contatti">
                <h4 class="informazione">TELEFONO / FAX</h4>
                <p class="dato">'.$result_info['telefono'].'</p>
                <h4 class="informazione"><span xml:lang="en">EMAIL</span></h4>
                <p class="dato">'.$result_info['mail'].'</p>
                <h4 class="informazione">SITO WEB</h4>
                <a class="dato" href="'.$result_info['sito'].'">'.$result_info['sito'].'</a>
                
                <div id="orari">
                    <h4 class="informazione">ORARI</h4>';
                    for($i =0; $i < 7 ; $i ++){
                        echo '<p class="dato"><strong>'.$giorni[$i].':</strong>'.$result_orario[$i].'</p>';
                    }
echo           '</div>
            </div>
        </div>

            <div id="descrizione">
                    <p id="testo">               
                        <strong>'.$result_info['motto'].'</strong><br/>'.$result_info['descrizione'].'</p>
                    <div id="prodotti">
                        <h4 class="titolo_prodotti">PRODOTTI</h4>
                        
                        <div class="prodotto">
                            <a href="prodotto1.html">
                            <img class="gioco" src="images/lego1.jpg" alt="prodotto in vendita"/>
                             </a>
                            <h5 class="NomeItem">gioco 1</h5>
                        </div>  

                        <div class="prodotto">
                            <a href="prodotto1.html">
                            <img class="gioco" src="images/lego2.jpg" alt="prodotto in vendita"/>
                             </a>
                            <h5 class="NomeItem">gioco 2</h5>
                        </div>

                        <div class="prodotto">
                            <a href="prodotto1.html">
                            <img class="gioco" src="images/lego3.jpg" alt="prodotto  in vendita"/>
                             </a>
                            <h5 class="NomeItem">gioco 3</h5>
                        </div>                       
                    </div>
                    
                    <div id="promozioni">

                      <h4 class="titolo_prodotti">PROMOZIONI</h4>
                     <div id="elencoPromozioni">
                       <div class="singola_promozione">
                          <a href="promo1.html">
                          <img class="promozione" src="images/promo1.jpg" alt="promozione del negozio"/> 
                          </a>
                          <p>Nome_Negozio_1</p>
                       </div>
                       <div class="singola_promozione">
                          <a href="promo2.html">
                          <img class="promozione" src="images/promo2.jpg" alt="promozione del negozio"/>
                          </a> 
                          <p>Nome_Negozio_2</p>
                        </div>
                       <div class="singola_promozione">
                         <a href="promo3.html">
                         <img class="promozione" src="images/promo3.png" alt="promozione del negozio"/> 
                          </a>
                         <p>Nome_Negozio_3</p>
                        </div>
                       <div class="singola_promozione">
                          <a href="promo4.html">
                          <img class="promozione" src="images/promo1.jpg" alt="promozione del negozio"/> 
                          </a>
                          <p>Nome_Negozio_4</p>
                       </div>
                       <div class="singola_promozione">
                         <a href="promo5.html">
                         <img class="promozione" src="images/promo1.jpg" alt="promozione"/> 
                          </a>
                          <p>Nome_Negozio_4</p>
                        </div>
                      </div>


                    </div>
            </div>
         </div>  
';
/*
$rows =array();
while($row = $result_pro->fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}
if(count($rows)){
    foreach($rows as $row){
        echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';           
    }
}
*/
?>
