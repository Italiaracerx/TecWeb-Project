<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class name_change extends connection implements query{
    private $user;
    private $newName;

    public function __construct($shopName=NULL){
        $this->user=parent::escaped_string($_SESSION['user']);
        $this->newName=parent::escaped_string($shopName);
    }

    public function update(){
        $query="UPDATE info SET negozio='$this->newName' WHERE username='$this->user';";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }

    public function read(){
        $query = "SELECT A.negozio FROM info A WHERE A.username = '$this->user'";
        return mysqli_fetch_array(parent::execute_query($query));
    }

    public function write(){}
}

?>