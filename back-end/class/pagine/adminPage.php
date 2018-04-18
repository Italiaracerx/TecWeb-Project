<?php

require_once __DIR__.'\..\interfacce\page_template.php';
require_once __DIR__.'\menu\menu.php';
require_once __DIR__.'\menu\staticMenu.php';


class adminPage implements page_template{
	private $menu;
	private $name= "Administrator";
	private static $newUser="newUser.php";
	private static $modifiedPassowrd="modifedPassword.php";
	private static $aperture="aperture.php";
	private static $news="news.php";
	private static $deleteShop="deleteShop.php";
	
	public function __construct(){
		$this->menu= new menu((new staticPath())->admin());
	}
	public function getNamePage(){
		return $this->name;
	}
	public function menu(){
		$this->menu->print();
	}	
}

?>
