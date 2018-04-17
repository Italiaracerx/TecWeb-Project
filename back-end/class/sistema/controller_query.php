<?php
require_once __DIR__.'\controller.php';
require_once __DIR__.'\..\interfacce\query.php';
require_once __DIR__.'\..\query\log.php';

class controller_query extends controller{
	private $question;
    
    public function __construct(query $query){
        parent::__construct();
    	$this->page =NULL;
    	$this->question =$query;
    }
    public function login(){
    	try{
    		$this->managerS->define_session($this->question->login());
    	}
        catch(exeption $ex){
            $this->managerS->set_flag($ex);
        }    
    }
    public function write(){
        try{
            $this->question->write();
        }
        catch(exeption $ex){
            $this->managerS->set_flag($ex);
        }      }
}
?>