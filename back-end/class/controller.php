<?php

require_once("exeption.php");
require_once("page_template.php");
require_once("page.php");
require_once("session_manager.php");
require_once("log.php");


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
    }
    public function check_session(){
    	$this->managerS->check_session();
    }
    public function logout(){
    	$this->managerS->logout();
    }
}

class controller_query extends controller{
	private $question;
    
    public function __construct(query $query){
        parent::__construct();
    	$this->page =NULL;
    	$this->question =$query;
    }
    public function login(){
    	try{
    		$this->managerS->define_session($this->question->read());
    	}
        catch(exeption $ex){
            $this->managerS->set_flag($ex);
        }    
    }
    public function read(){

    }
    public function write(){

    }
}


?>