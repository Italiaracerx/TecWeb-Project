<?php 
require_once("controller.php");
require_once("exeption.php");
require_once("connection.php");


class deleteNegozio extends connection{
    //campi privati
    private $username;
    //metodi
    public function __construct($user){
        parent::__construct();
        $this->username =mysqli::real_escape_string($user);
    }
    public function write(){
        $controller->session();
        $query = "INSERT INTO account VALUES ('$this->username','user','$this->password')";
        if(parent::execute_query($query)){
            $this->controller->set_flag(new exeption("correct","Scrittura eseguita con successo."));
        }
        else{
            $this->controller->set_flag(new exeption("error","Scrittura non eseguita."));
        }
    }
    public function read(){
        $controller->session();
        $query = "SELECT A.username, T.user_type, T.link FROM account A INNER JOIN type_account T ON A.type = T.user_type WHERE username = $this->user AND password = $this->password";
        $utente=mysqli_fetch_array(parent::execute_query($query));
        if($utente['username'] != NULL){
            $this->controller->define_session($utente);
        }
        else{
            $this->controller->set_flag(new exeption("error","Login e password errati"));
        }
    }
}

?>