<?php
require_once("controller.php");
require_once("../query/log.php");

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
    	try{
    		return $this->question->read();
    	}
        catch(exeption $ex){
            $this->managerS->set_flag($ex);
        }  
    }
    public function write(){

    }
}
?>