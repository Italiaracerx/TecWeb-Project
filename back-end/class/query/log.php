<?php 

require_once("../sistema/exeption.php");
require_once("../sistema/connection.php");
require_once("../interfacce/query.php");

class log extends connection implements query{
    //campi privati
    private $username;
    private $password;
    private $confirm;

    //metodi
    public function __construct($user,$psw1, $psw2=0){
        $this->username =parent::espaced_string($user);
        $this->password =hash('sha1',parent::espaced_string($psw1));
        $this->confirm =hash('sha1',parent::espaced_string($psw2));
    }
    public function write(){
        $query = "INSERT INTO account VALUES ('$this->username','user','$this->password')";
        return parent::execute_query($query);
    }
    public function read(){
        $query = "SELECT A.username, T.user_type, T.link FROM account A INNER JOIN type_account T ON A.type = T.user_type WHERE A.username = '$this->username' AND A.password = '$this->password'";
        return mysqli_fetch_array(parent::execute_query($query));
    }
}

?>
