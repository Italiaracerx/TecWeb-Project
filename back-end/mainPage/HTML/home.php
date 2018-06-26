<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_public.php';
    require_once __DIR__.'/../../class/query/orario.php';
    require_once __DIR__.'/../../class/query/image.php';
    require_once __DIR__.'/../../class/query/news.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_public('home',(new menu((new staticPath())->public_menu('0'))),'en'));
    $controller->head();
?>
	  <div id="content">
      <div id="corpo">
		    <img id="imgTorre" src="images/default/torre 2.jpg" alt="immagine torre archimede" />
		    <h2>Benvenuti nel Centro Commerciale Archimede</h2>

		    <div id="contentRight">
		  
                <h3>ORARI</h3>
                <?php
                    $orario =new orario('admin');
                    $giorni = array();
                    $giorni =$orario->getGiorniHTML();
                    $result_orario =$orario->read()->fetch_array(MYSQLI_NUM);
                    
                    for($i =0; $i < 7 ; $i ++){
                        echo '<p><strong>'.$giorni[$i].' :</strong> '.$result_orario[$i].'</p>';
                    }
                ?>            
				<h3>Aperture Straordinarie</h3>
                    <ul>
                    <?php
                        $news =new news('APERTURA');
                        $aperture =$news->read();
                        $rows =array();
                        while($row = $aperture->fetch_array(MYSQLI_ASSOC)){
                            $rows[] = $row;
                        }
                        foreach($rows as $row){
                            echo '<li>Aperti in data: '.$row['data'].'</li>';
                        }
                    ?>    
                    </ul>
			     
         
             <h3>Chiusure Straordinarie</h3>
                <ul>
                <?php
                    $chiusure =$news->read('CHIUSURE');
                    $rows =array();
                    while($row = $chiusure->fetch_array(MYSQLI_ASSOC)){
                        $rows[] = $row;
                    }
                    foreach($rows as $row){
                        echo '<li>Chiusi in data: '.$row['data'].'</li>';
                    }
                ?>               
                </ul>
      
        
                <h3>Novità</h3>
                    <ul>
                    <?php
                        $novita =$news->read('NOVITA');
                        $rows =array();
                        while($row = $novita->fetch_array(MYSQLI_ASSOC)){
                            $rows[] = $row;
                        }
                        foreach($rows as $row){
                            echo '<li>'.$row['descrizione'].'. Data: '.$row['data'].'</li>';
                        }
                    ?>                   
                    </ul>
		  
      
            <div id="area_amministrazione">
                <a href="login.html">
                 <img src="images/default/profilo.jpg" alt="immagine area amministratore"/>
                 AREA AMMINISTRAZIONE
                </a>
            </div>
          </div>

		    <div id="contentLeft">

<ul id="casella">
 <li><a href="negozi.html">Negozi</a></li>
 <li><a href="dovesiamo.html">Dove Siamo</a></li>
 <li><a href="contatti.html">Contatti</a></li>
</ul>
<h2 >Promozioni</h2>

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
            echo '<ul id="promozione">';
            foreach($rows as $row){
                echo '
                <li>
                    <a href="promo2.html">
                        <img src="images/promozione/'.$row['source'].'" alt="'.$row['alt'].'"/>
                    '.$row['negozio'].'
                    </a> 
                </li>';
            }
            echo '  </ul>';
        }
?>
</div>
</div>
</div>

<?php
$controller->footer();
?>
