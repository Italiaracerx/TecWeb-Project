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
        $this->type_user =$_SESSION['type'];
        $this->page =preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($_SERVER['PHP_SELF']));
        if($this->page == 'login' && $_SESSION['link'] != NULL){
            $this->page=$_SESSION['link'];
        }
    }
    public function getPage(){
        return $this->page;
    }
    public function write(){
        $query = "INSERT INTO type_account VALUES ('$this->username','user','$this->password')";
        return parent::execute_query($query);
    }
    public function read(){
        $query = "SELECT link FROM type_account WHERE user_type = '$this->type_user' AND link = '$this->page'";
        $permission=NULL;
        $permission =parent::execute_query($query);
        return mysqli_num_rows($permission);
    }
}

?>