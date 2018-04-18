<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class permission extends connection implements query{
    //campi privati
    private $type_user;
    private $page;

    //metodi
    public function __construct(){
        $this->type_user=$_SESSION['type'];
        $this->page=basename($_SERVER['PHP_SELF'],'.php');
    }
    public function write(){
        $query = "INSERT INTO type_account VALUES ('$this->username','user','$this->password')";
        return parent::execute_query($query);
    }
    public function read(){
        $query = "SELECT link FROM type_account WHERE user_type = '$this->type_user' AND link = '$this->page'";
        $permission=NULL;
        $permission=mysqli_fetch_array(parent::execute_query($query));
        return isset($permission);
    }
}

?>
