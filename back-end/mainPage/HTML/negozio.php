<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/negozi.php';
    require_once __DIR__.'/../../class/query/shop.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new negozi(new menu((new staticPath())->public_menu('1'))));
    $controller->head();
    echo '<div id="content">';
    $shop = new shop();
    $result_pro =$shop->all();
    $rows =array();
    while($row = $result_pro->fetch_array(MYSQLI_ASSOC)){
      $rows[] = $row;
    }
    if(!count($rows)){
      echo 'non ci sono negozi';
    }
    else{
      foreach($rows as $row){
            echo '    
            <div class="vetrina">
            <a href="negozio?shop='.$row['username'].'">
                <img src="images/logo/'.$row['logo'].'" alt="'.$row['alt'].'"/>
            </a>
            <h5 class="NomeItem">'.$row['negozio'].'</h5>
        </div>';
      }
    }

echo '</div>';


$controller->footer();
?>
