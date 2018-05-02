<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class news extends connection implements query{
    private $type;
    private $date;
    private $news;


    //metodi
    public function __construct($tipo, $date, $evento =NULL){
        $this->type =parent::escaped_string($tipo);
        $this->date =parent::escaped_string($date);
        $this->news =parent::escaped_string($evento);
    }
    public function write(){
        if(empty($matches)){new exeption('error','Orario non in formato GG-MM-AAAA.');}
        $query = "INSERT INTO eventi VALUES (NULL,'$this->type','$this->date','$this->news')";
        if(parent::execute_query($query)){
            throw new exeption("correct","Modifica orari eseguita con successo.");
        }
        else{
            throw new exeption("error","Non è stato possibile inserire la novita. Riprovare più tardi.");
        }
    }
    public function read(){
        $query = "SELECT type, descrizione FROM eventi WHERE type = '$this->type' ORDER BY ID DESC LIMIT 10";
        return mysqli_fetch_array(parent::execute_query($query));
    }
    public function delete(){
        $current_date= date ("d-m-Y");
        $query = "DELETE FROM eventi WHERE data < '$current_date'";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'utente non presente.');
        }
    }
}

?>
