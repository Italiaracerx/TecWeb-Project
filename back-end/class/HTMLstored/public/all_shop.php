<?php

require_once __DIR__.'/../../query/shop.php';

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
        echo '<ul id="negozio">';
        foreach($rows as $row){
            echo '
            <li>
            <a href="negozio.php?shop='.$row['username'].'">
                <img src="images/logo/'.$row['logo'].'" alt="'.$row['alt'].'"/>
            '.$row['negozio'].'
            </a>
            </li>';
        }
        echo '</ul>';
    }
?>