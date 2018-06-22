<?php 
require_once __DIR__.'/page_private.php';


class modifica extends page_private{
	private $menu;
	private $name;
	private $javascript;

	public function __construct($name, menu $menu, $js =NULL){
		negozi($name, $menu, $js);
	}

    public function breadcrumb(){
    	$breadcrumb ='<div id="breadcrumb"><h2><strong>';
    	if($_SESSION['user'] != NULL){
    		$breadcrumb =$breadcrumb.$_SESSION['user'].' : </strong> '.$this->name.'</h2></div>';
    	}
    	else{
    		$breadcrumb =$breadcrumb.$this->name.'</strong></h2></div>';
    	}
    	echo $breadcrumb;
	}
}
?>
