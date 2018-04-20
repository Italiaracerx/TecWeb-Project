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
            $_SESSION['link'] = NULL;
            $this->set_flag(new exeption());
        }
    }
    public function check_session(){
        $permission= new permission();
        echo $permission->getPage().'----'.$_SESSION['link'];
        if(basename($_SERVER['PHP_SELF'],'.php') == 'login'){
            if($_SESSION['link'] != NULL){
                if($permission->read()){
                    $this->logout();
                }
                else{
                    header('location: '.$_SESSION['link'].'.php');
                }
            }
        }
        elseif($permission->read()){
            $this->logout();
        }
        else{
            $_SESSION['link'] =$permission->getPage();
        }
    }
    public function define_session($utente){
        //setto nell'array di sessione le informazioni

        if($utente == NULL){
           $this->set_flag(new exeption("error","Login o password errati."));
        	header("Location: ../login.php");
        }
        else{
	        $_SESSION['user']=$utente['username'];
            $_SESSION['type']=$utente['user_type'];
            $_SESSION['link']=$utente['link'];
            $this->set_flag(new exeption("correct","Login effettuato con successo. Benvenuto ".$_SESSION['user'].'.'));
            
            header('Location: '.'..'.DIRECTORY_SEPARATOR.$_SESSION['link'].'.php');
        }
    }
    public function logout(){
        session_unset();
        session_destroy();
        $this->session();
        header('Location: '.'..'.DIRECTORY_SEPARATOR.'login.php');
        die;
    }
    public function GoTo(){
        if($_SESSION['link'] != NULL){
            header('Location: '.'..'.DIRECTORY_SEPARATOR.$_SESSION['link'].'.php');
        }
        else{
            $this->logout();
        }
    }
}

?>