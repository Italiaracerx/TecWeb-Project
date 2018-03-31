<?php 
require_once("controller.php");
require_once("exeption.php");
require_once("connection.php");


class shop extends connection{
    //campi privati
    private $username;
    private $password;
    private $confirm;

    //metodi
    public function __construct($user,$psw1=0, $psw2=0){
        parent::__construct();
        $this->username =mysqli::real_escape_string($user);
        $this->password =hash('sha1',mysqli::real_escape_string($psw1));
        $this->confirm =hash('sha1',mysqli::real_escape_string($psw2));
    }
    public function log(){
        $controller->session();
        $query = "SELECT A.username,A.typeuser,T.link FROM account A INNER JOIN type_account T ON A.user_type = T.user_type 
        WHERE A.username = $this->username AND password = $this->password";
        if(parent::execute_query($query)){}
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
    public function delete(){
        $controller->session();
        $query = "DELETE FROM account WHERE username = $this->username";

    }
}

?>