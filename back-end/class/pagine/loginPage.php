<?php

require_once("../interfacce/page_template.php");
require_once("menu/menu.php");


class loginPage implements page_template{
	private $menu;
	private $name= "Login";
	private $php="verifica.php";
	public function __constructor(){
		$this->menu= (new menu())->login();
	}
	public function getNamePage(){
		return $this->name;
	}
	public function menu(){
		echo $this->menu->printMenu();
	}
	public function getPage(){
		echo '   <div id="content">
			        <div id="content">
			            <form action="'.$this->php.'" method="post">
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
