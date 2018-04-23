<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class infos_changer extends connection implements query{
    private $user;
    private $newDescription;

    public function__construct($username, $shopDescription){
        $this->user=parent::escaped_string($username);
        $this->newDescription=parent::escaped_string($shopDescription);
    }

    public function update_shop_description(){
        $query="UPDATE info SET descrizione='$newName' WHERE username='$user';";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }

    public function read(){}

    public function write(){}
}

?>