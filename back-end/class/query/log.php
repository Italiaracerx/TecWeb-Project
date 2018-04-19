<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class login extends connection implements query{
    //campi privati
    private $username;
    private $password;
    private $confirm;
    private $length;

    //metodi
    public function __construct($user=NULL,$psw1=NULL, $psw2=NULL){
        $this->username =parent::escaped_string($user);
        $this->password =parent::escaped_string($psw1);
        $this->confirm =parent::escaped_string($psw2);
        $this->length=strlen($this->password);
        $this->password =sha1($this->password);
        $this->confirm =sha1($this->confirm);
    }
    public function write(){
        if($this->length < '4'){throw new exeption('error','password troppo corta');}
        if($this->password != $this->confirm){throw new exeption('error','password discordanti');}
        $query = "INSERT INTO account VALUES ('$this->username','user','$this->password')";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'utente esistente.');
        }
    }
    public function login(){
        $query = "SELECT A.username, T.user_type, T.link FROM account A INNER JOIN type_account T ON A.type = T.user_type WHERE A.username = '$this->username' AND A.password = '$this->password' AND T.home = '1'";
        $utente =mysqli_fetch_array(parent::execute_query($query));
        echo $utente;

        return $utente;
    }
    public function read(){
        $query = "SELECT A.username FROM account A WHERE A.type <> 'admin'";
        return parent::execute_query($query);

    } 
    public function delete(){
        if($this->username == "Cerca nel menu:"){
            throw new exeption('error', 'seleziona un utente da eliminare.');
        }
        $query = "DELETE FROM account WHERE username = '$this->username'";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'utente non presente.');
        }
    }
    public function update(){
        if($this->length < '4'){throw new exeption('error','password troppo corta');}
        if($this->password != $this->confirm){throw new exeption('error','password discordanti');}
        $query = "UPDATE account SET password = '$this->password' WHERE username = '$this->username'";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }    }    
}

?>