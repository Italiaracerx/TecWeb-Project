<?php

require_once("../interfacce/page_template.php");

class loginPage implements page_template{
	private $name= "Administrator";
    private static $php="verifica.php";

	public function getNamePage(){
		return $this->name;
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
