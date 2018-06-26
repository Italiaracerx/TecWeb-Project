<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_public.php';
    require_once __DIR__.'/../../class/query/image.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_public('Promozioni',(new menu((new staticPath())->public_menu('4')))));
    $controller->head();
?>
    <div id="content">
        <h2 id="intestazione">PROMOZIONI CORRENTI</h2>

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
                        echo '<div id="PromozioniAttive">';
                        echo '<ul id="promozione">';

                        foreach($rows as $row){
                            echo '
                            <li>
                                <a href="promo1.html">
                                    <img src="images/promozione/'.$row['source'].'" alt="'.$row['alt'].'"/> 
                                '.$row['negozio'].'
                                </a>
                            </li>';
                        }
                        echo '  </ul>';
                        echo '</div>';
                    }
        ?>
    </div>
    

<?php
$controller->footer();
?>
