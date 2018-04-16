<?php 

require_once __DIR__.'\..\sistema\exeption.php';
require_once __DIR__.'\..\sistema\connection.php';
require_once __DIR__.'\..\interfacce\query.php';

class news extends connection implements query{
    private $news;
    private $type;

    //metodi
    public function __construct($tipo, $evento =NULL){
        $this->news =parent::escaced_string($evento);
        $this->type =parent::escaced_string($tipo);
    }
    public function write(){
        $query = "INSERT INTO eventi VALUES ('$this->type','$this->password')";
        return parent::execute_query($query);
    }
    public function read(){
        $query = "SELECT type, descrizione FROM eventi WHERE type = '$this->type' ORDER BY ID DESC LIMIT 10";
        return mysqli_fetch_array(parent::execute_query($query));
    }
}

?>
