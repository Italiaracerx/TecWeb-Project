<?php

    require_once __DIR__.'/../query/permission.php';

class session_manager{
	//metodi
    public function __construct(){
        $this->session();
    }

	public function set_flag(exeption $ex){
        $_SESSION['flag']=$ex->getFlag();        //la flag serve per errori o altro, NULL niente da segnalare, 1 operazione avvenuta, 2 operazione fallita
        $_SESSION['flag_text']=$ex->getText_flag();   // campo flag_text riporta un messaggio descrivendo la flag
    }
    public function session(){
        session_start();
        if(empty($_SESSION)){
            $_SESSION['user'] = NULL;//inizializzo a NULL l'utente corrente
            $_SESSION['type'] = 'unlogged';//type rapprensenta il tipo di utente se messo a NULL nessun utente loggato
            $this->set_flag(new exeption());
        }
    }
    public function check_session(){
        $permission= new permission();
        if(!$permission->read()){
            header("Location: login.php");            
        }
    }
    public function define_session($utente){
        //setto nell'array di sessione le informazioni

        if($utente == NULL){
           $this->set_flag(new exeption("error","Login o password errati."));
        	//header("Location: ../login.php");
        }
        else{
	        $_SESSION['user']=$utente['username'];
	        $_SESSION['type']=$utente['user_type'];
	        $this->set_flag(new exeption("correct","Login effettuato con successo. Benvenuto ".$utente['username'].'.'));
            header('Location: '.'..'.DIRECTORY_SEPARATOR.$utente['link'].'.php');
        }
    }
    public function logout(){
        session_unset();
        session_destroy();
        $this->session();
        $this->set_flag(new exeption("correct","Logout avvenuto con successo.")); 
        header('Location: '.'..'.DIRECTORY_SEPARATOR.'login.php');
    }
}

?>