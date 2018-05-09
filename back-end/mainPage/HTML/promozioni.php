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
                        echo '<div id="promozioniAttive">';
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
    

<?php
$controller->footer();
?>
