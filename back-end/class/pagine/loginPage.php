<?php

require_once __DIR__.'\..\interfacce\page_template.php';
require_once __DIR__.'\menu\menu.php';
require_once __DIR__.'\menu\staticMenu.php';

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
	public function getPage(){
		echo '   <div id="content">
			        <div id="content">
			            <form action="mainForm'.DIRECTORY_SEPARATOR.$this->verifica.'" method="post">
			                <div id="formLogin">
			                    <label for="NomeUtente">Nome Utente:</label>
			                    <input name="username" type="text">
			                    <label for="Password">Password:</label>
			                    <input name="password"type="password">
			                    <input type="submit" value="Accedi">
			                </div>
			            </form>
			        </div>
			    </div>';
	}

}

?>
