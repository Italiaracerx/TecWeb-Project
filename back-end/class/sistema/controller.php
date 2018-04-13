<?php

require_once("exeption.php");
require_once("../interfacce/page_template.php");
require_once("../pagine/page.php");
require_once("session_manager.php");

class controller{
	private $page;
    protected $managerS;
    //metodi
    public function __construct(page_template $pag=NULL){
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
