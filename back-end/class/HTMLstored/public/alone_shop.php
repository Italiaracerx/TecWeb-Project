<?php

require_once __DIR__.'/../../query/orario.php';
require_once __DIR__.'/../../query/logo.php';
require_once __DIR__.'/../../query/image.php';
require_once __DIR__.'/../../sistema/connection.php';

        $shop =$_GET['shop'];

        $connection= new connection();
        $logo = new logo($shop);
        $orario =new orario($shop);
        $promozione = new image('promozione',$shop);
        $prodotto = new image('prodotto',$shop);

        $info ="SELECT * FROM info I WHERE I.username = '$shop'";

        $result_info = $connection->execute_query($info)->fetch_array(MYSQLI_ASSOC);
        $result_logo =$logo->read()->fetch_array(MYSQLI_ASSOC);
        $result_orario =$orario->read()->fetch_array(MYSQLI_NUM);

        $giorni = array();
        $giorni =$orario->getGiorniHTML();



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
                <a class="dato" href="http://'.$result_info['sito'].'">'.$result_info['sito'].'</a>
                
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
                    <strong>'.$result_info['motto'].'</strong><br/>'.$result_info['descrizione'].'
                </p>
                <div id="prodotti">
                    <h4 class="titolo_prodotti">PRODOTTI</h4>';
                    
                $result_prodotto =$prodotto->read();
                $row_p =array();
                while($row = $result_prodotto->fetch_array(MYSQLI_ASSOC)){
                    $row_p[] = $row;
                }
                if(!count($row_p)){
                    echo '                
                    <div class ="no_image">
                        <p class="text_message">coming soon</p>
                    </div>';
                }
                else{
                    foreach($row_p as $row){
                        echo '  <div class="prodotto">
                                    <a href="prodotto1.html">
                                        <img class="gioco" src="images/prodotto/'.$row['source'].'" alt="'.$row['alt'].'"/>
                                    </a>
                                    <h5 class="NomeItem">'.$row['titolo'].'</h5>
                                </div>';
                    }
                }
                echo '</div>';
                 
                echo '
                    
                <div id="promozioni">
                    <h4 class="titolo_prodotti">PROMOZIONI</h4>';

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
                                <p>'.$row['titolo'].'</p>
                            </div>';
                        }
                        echo '  </div>';
                    }                 
        echo '

            </div>
            </div>
         </div>  
';

?>
