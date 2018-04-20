<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class infos_changer extends connection implements query{
    private $user;
    private $phoneNumber;
    private $emailAddress;
    private $webLink;

    public function__construct($username, $phone, $email, $website){
        $this->user=parent::escaped_string($user);
        $this->phoneNumber=parent::escaped_string($phone);
        $this->emailAddress=parent::escaped_string($email);
        $this->weblink=parent::escaped_string($website);
    }

    public function update(){
        $query="UPDATE info SET telefono='$phoneNumber', mail='$emailAddress', sito='$webLink' WHERE username='$user';";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }
}

?>