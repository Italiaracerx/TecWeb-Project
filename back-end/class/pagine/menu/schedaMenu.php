<?php

class schedaMenu{
    private $name;
    private $link;
    public function __construct($nm,$lk){
        $this->name =$nm;
        $this->link =$lk;
    }
    public function printScheda(){
        echo '<li><a href="'.$this->link.'">'.$this->name.'</a></li>';
    }
}

?>