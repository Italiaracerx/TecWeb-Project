<?php

require_once __DIR__.'/../../query/orario.php';
require_once __DIR__.'/../../query/logo.php';
require_once __DIR__.'/../../query/image.php';
require_once __DIR__.'/../../query/lang.php';
require_once __DIR__.'/../../sistema/connection.php';

        $shop =$_GET['shop'];
        unset($_GET['shop']);

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

        if($result_info == NULL || $result_logo == NULL || $result_orario == NULL){
            header('location: negozio.php');
            die;
        }

        $langMotto=getTextLanguage($result_info['motto'],'it');
        $startMotto=NULL;
        $endMotto=NULL;
        if($langMotto != 'it'){
            $startMotto='<span xml:lang="'.$langMotto.'">';
            $endMotto='</span>';
        }

        $langDescr=getTextLanguage($result_info['descrizione'],'it');
        $startDescr=NULL;
        $endDescr=NULL;
        if($langDescr != 'it'){
            $startDescr='<span xml:lang="'.$langDescr.'">';
            $endDescr='</span>';
        }


echo '<div id="content_negozio">';
    echo '<h3 id="intestazione">'.$result_info['negozio'].'</h3>';

        echo   '<div id="informazioni">';
            echo '<img id="logo_negozio" src="images/logo/'.$result_logo['logo'].'" alt="Logo del negozio '.$result_info['negozio'].'"/>
            <div id="contatti">
                <h4>Telefono \ Fax</h4>
                <p>'.$result_info['telefono'].'</p>
                <h4><span xml:lang="en">Email</span></h4>
                <p>'.$result_info['mail'].'</p>
                <h4>Sito web</h4>
                <a href="http://'.$result_info['sito'].'">'.$result_info['sito'].'</a>'; 

            echo '<div id="orari">
                    <h4>Orari</h4>';
                    for($i =0; $i < 7 ; $i ++){
                        echo '<p><strong>'.$giorni[$i].':</strong>'.$result_orario[$i].'</p>';
                    }
echo           '</div>
            </div>
        </div>

            <div id="descrizione">
                <p id="testo">               
                    <strong>'.$startMotto.$result_info['motto'].$endMotto.'</strong><br/>'.$startDescr.$result_info['descrizione'].$startDescr.'
                </p>
                <div id="prodotto">
                    <h4>Prodotti</h4>';
                    
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
                    echo '<ul>';
                    foreach($row_p as $row){
                        echo '  <li>
                                    <a href="visual_page.php?titolo='.$row['titolo'].'">
                                        <img src="images/prodotto/'.$row['source'].'" alt="'.$row['alt'].'"/>'
                                    .$row['titolo'].'
                                    </a>
                                </li>';
                    }
                    echo '</ul>';
                }
                echo '</div>';
                 
                echo '
                    
                <div id="promozione">
                    <h4>Promozioni</h4>';

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
                        echo '<ul>';
                        foreach($rows as $row){
                            echo '  <li>
                                        <a href="visual_page.php?titolo='.$row['titolo'].'">
                                            <img src="images/promozione/'.$row['source'].'" alt="'.$row['alt'].'"/>'
                                        .$row['titolo'].'
                                        </a>
                                    </li>';
                        }
                        echo '</ul>';
                    }
        echo '
                </div>
            </div>
            </div>
         </div>  
';

?>
