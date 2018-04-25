<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class infos_changer extends connection implements query{
    private $user;
    private $phoneNumber;
    private $emailAddress;
    private $webLink;

    public function __construct($phone=NULL, $email=NULL, $website=NULL){
        $this->user=parent::escaped_string($_SESSION['user']);
        $this->phoneNumber=parent::escaped_string($phone);
        $this->emailAddress=parent::escaped_string($email);
        $this->webLink=parent::escaped_string($website);
    }

    public function update(){
        $query="UPDATE info SET telefono='$this->phoneNumber', mail='$this->emailAddress', sito='$this->webLink' WHERE username='$this->user';";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }

    public function read(){
        $query = "SELECT A.telefono, A.mail, A.sito FROM account A WHERE A.username = '$this->user'";
        return mysqli_fetch_array(parent::execute_query($query));
    }

    public function write(){}
}

?>