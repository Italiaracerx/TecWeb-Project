<?php

class schedaMenu{
    private $name;
    private $link;
    private $active =NULL;
    public function __construct($nm,$lk){
        $this->name =$nm;
        $this->link =$lk;
    }
    public function printScheda(){
        $str ='<li><a '.$this->active.' href="'.$this->link.'">'.$this->name.'</a></li>';
        return $str;
    }
    public function activation(){
    	$this->active ='class ="active"';
    }

}

?>
