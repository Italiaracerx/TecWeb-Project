<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class shop_slogan extends connection implements query{
    private $user;
    private $newSlogan;
    private $newDescription;

    public function __construct($shopSlogan=NULL, $shopDescription=NULL){
        $this->user=parent::escaped_string($_SESSION['user']);
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

    public function read(){
        $query="SELECT motto, descrizione FROM info WHERE username='$this->user'";
        return mysqli_fetch_array(parent::execute_query($query));
    }

    public function write(){}
}

?>