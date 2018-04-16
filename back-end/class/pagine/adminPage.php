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
	public function getPage(){
		$file = file_get_contents('./preambolo.html', FILE_USE_INCLUDE_PATH);
		$file = str_replace('__USER__','admin',$file);
		$file = str_replace('__NAME_PAGE__','Administrator',$file);
		$file = str_replace('__STYLE__','private_style',$file);

		echo $file;
	}
}

?>
