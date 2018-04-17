<?php 

require_once __DIR__.'\..\sistema\exeption.php';
require_once __DIR__.'\..\sistema\connection.php';
require_once __DIR__.'\..\interfacce\query.php';

class login extends connection implements query{
    //campi privati
    private $username;
    private $password;
    private $confirm;

    //metodi
    public function __construct($user,$psw1, $psw2=0){
        $this->username =parent::escaped_string($user);
        $this->password =hash('sha1',parent::escaped_string($psw1));
        $this->confirm =hash('sha1',parent::escaped_string($psw2));
    }
    public function write(){
        $query = "INSERT INTO account VALUES ('$this->username','user','$this->password')";
        return parent::execute_query($query);
    }
    public function read(){
        $query = "SELECT A.username, T.user_type, T.link FROM account A INNER JOIN type_account T ON A.type = T.user_type WHERE A.username = '$this->username' AND A.password = '$this->password'";
        $utente =mysqli_fetch_array(parent::execute_query($query));
        return $utente;
    }
    public function all(){
        $query = "SELECT username FROM account WHERE user_type <> 'admin";
        $utente =mysqli_fetch_array(parent::execute_query($query));
        return $utente;
    } 
    public function delete(){
        $query = "DELETE FROM account WHERE username = '$this->username'";
        return parent::execute_query($query);
    }
    public function update(){
        if($this->password != $this->confirm){throw exeption("error", "Password discordanti, riprovare.");}
        $query = "UPDATE account SET password = '$this->password' WHERE username = '$this->username'";
        return parent::execute_query($query);
    }    
}

?>
