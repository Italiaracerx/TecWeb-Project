<?php

require_once __DIR__.'\exeption.php';
require_once __DIR__.'\..\interfacce\page_template.php';
require_once __DIR__.'\..\pagine\page.php';
require_once __DIR__.'\session_manager.php';

class controller{
	private $page;
    protected $managerS;
    //metodi
    function __construct(page_template $pag=NULL){
        if($pag != NULL){
        $this->page =new page($pag);            
        }
    	$this->managerS =new session_manager;
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
