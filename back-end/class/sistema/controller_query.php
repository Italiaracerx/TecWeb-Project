<?php
require_once __DIR__.'/controller.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/../query/log.php';

class controller_query extends controller{
	private $question;
    
    public function __construct(){
        parent::__construct();
    }
    public function setQuery(query $query){
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
            $this->managerS->set_flag(new exeption('correct','Operazione eseguita con successo.'));
        }
        catch(exeption $ex){
            $this->managerS->set_flag($ex);
        }
        $this->managerS->GoTo();
    }
    public function delete(){
        try{
            $this->question->delete();
            $this->managerS->set_flag(new exeption('correct','Operazione eseguita con successo.'));
        }
        catch(exeption $ex){
            $this->managerS->set_flag($ex);
        }
        $this->managerS->GoTo();
    }
    public function update(){
        try{
            $this->question->update();
            $this->managerS->set_flag(new exeption('correct','Operazione eseguita con successo.'));
        }
        catch(exeption $ex){
            $this->managerS->set_flag($ex);
        }
        $this->managerS->GoTo();
    }
}
?>