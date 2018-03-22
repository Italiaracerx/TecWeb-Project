<?php

require_once("exeption.php");

class controller{
    //metodi
    public function print_bar(){
        if($_SESSION['flag'] != NULL){
            echo '<h2 id="'.$_SESSION['flag'].'">'.$_SESSION['flag_text'].'</h2>';
            $this->set_flag(new exeption());
        }
    }
    public function set_flag(exeption $ex){
        $_SESSION['flag']=$ex->getFlag();        //la flag serve per errori o altro, 0 niente da segnalare, 1 operazione avvenuta, 2 operazione fallita
        $_SESSION['flag_text']=$ex->getText_flag();   // campo flag_text riporta un messaggio descrivendo la flag
    }
    public function session(){
        $_SESSION['user'] = NULL;//inizializzo a NULL l'utente corrente
        $_SESSION['type'] = NULL;//type rapprensenta il tipo di utente se messo a NULL nessun utente loggato
        $_SESSION['link'] = NULL;//indica il nome della pagina a cui questo indirizzo fa riferimento
        $this->set_flag(new exeption());
    }
    public function check_session(){
        session_start();
        if (!empty($_SESSION)){
            $this->session();
        }
        elseif($_SESSION['type'] == NULL){
            $this->set_flag(new exeption("error","Sessione scaduta, esegui un nuovo login."));
            header("Location: login.php");
        }
        else{
            $this->set_flag(new exeption("correct","Bentornato"));
            header("Location: ".$_SESSION['link'].".php");
        }
    }
    public function define_session($utente){
        //setto nell'array di sessione le informazioni
        $_SESSION['user']=$utente['username'];
        $_SESSION['type']=$utente['user_type'];
        $_SESSION['link']=$utente['link'];
        $this->set_flag(new exeption("correct","Login effettuato con successo. Benvenuto ".$utente['username']));
        header("Location: ".$_SESSION['link'].".php");
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy(); 
        header("Location: login.php");
    }
}

?>