<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class infos_changer extends connection implements query{
    private $user;
    private $newSlogan;

    public function__construct($username, $shopSlogan){
        $this->user=parent::escaped_string($username);
        $this->newSlogan=parent::escaped_string($shopSlogan);
    }

    public function update_shop_slogan(){
        $query="UPDATE info SET negozio='$newSlogan' WHERE username='$user';";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }

    public function read(){}

    public function write(){}
}

?>