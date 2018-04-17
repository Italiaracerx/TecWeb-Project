<?php

require_once __DIR__.'\exeption.php';
require_once __DIR__.'\..\interfacce\page_template.php';
require_once __DIR__.'\..\interfacce\type_page.php';
require_once __DIR__.'\..\pagine\page_private.php';
require_once __DIR__.'\session_manager.php';

class controller{
	private $page;
    protected $managerS;
    //metodi
    function __construct(type_page $type_page =NULL){

        $this->page =$type_page;
    	$this->managerS =new session_manager;
    }
    public function printHTML(){
        try{
        $this->page->printHTML();
        $this->managerS->set_flag(new exeption());            
        }
        catch(exeption $ex){
        $this->managerS->set_flag($ex);                        
        }
    }
    public function check_session(){
    	$this->managerS->check_session();
    }
    public function logout(){
    	$this->managerS->logout();
    }
}

?>
