<?php

require_once("exeption.php");
require_once("../class/interfacce/page_template.php");
require_once("../class/pagine/page.php");
require_once("session_manager.php");

class controller{
	private $page;
    protected $managerS;
    //metodi
    function __constructor(page_template $pag){
    	$this->page =new page($pag);
    	$this->managerS =new session_manager();
    }

    public function printHTML(){
    	$this->page->printHTML();
    	$this->managerS->set_flag(new exeption());
    }
    public function check_session(){
    	$this->managerS->check_session();
    }
    public function logout(){
    	$this->managerS->logout();
    }
}

?>
