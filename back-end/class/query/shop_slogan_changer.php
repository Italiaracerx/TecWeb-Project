<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class shop_slogan extends connection implements query{
    private $user;
    private $newSlogan;
    private $newDescription;

    public function __construct($username, $shopSlogan, $shopDescription){
        $this->user=parent::escaped_string($username);
        $this->newSlogan=parent::escaped_string($shopSlogan);
        $this->newDescription=parent::escaped_string($shopDescription);

        $this->newSlogan =htmlentities($this->newSlogan);
        $this->newDescription =htmlentities($this->newDescription);
    }

    public function update(){
        $query="UPDATE info SET motto='$this->newSlogan', descrizione='$this->newDescription'  WHERE username='$this->user';";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }

    public function read(){}

    public function write(){}
}

?>