<?php

require_once __DIR__.'/../interfacce/page_template.php';
require_once __DIR__.'/menu/menu.php';
require_once __DIR__.'/menu/staticMenu.php';

class loginPage implements page_template{
	private $menu;
	private $name ="Login";
	private $verifica ="verifica.php";

	public function __construct(){
		$array=(new staticPath)->login();
		$this->menu= new menu($array);
	}
	public function getNamePage(){
		return $this->name;
	}
	public function menu(){
		$this->menu->print();
	} 

}

?>
