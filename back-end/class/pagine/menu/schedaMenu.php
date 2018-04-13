<?php

class schedaMenu{
    private $name;
    private $link;
    public function __constructor($nm,$lk){
        $name =$nm;
        $link =$lk;
    }
    public function printScheda(){
        echo '<li><a href="'.$this->link.'">'.$this->name.'</a></li>';
    }
}

?>
