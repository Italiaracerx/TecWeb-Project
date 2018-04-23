<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class infos_changer extends connection implements query{
    private $user;
    private $newName;

    public function__construct($username, $shopName){
        $this->user=parent::escaped_string($username);
        $this->newName=parent::escaped_string($shopName);
    }

    public function update_shop_name(){
        $query="UPDATE info SET negozio='$newName' WHERE username='$user';";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }

    public function read(){}

    public function write(){}
}

?>