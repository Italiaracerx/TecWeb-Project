<?php 

require_once __DIR__.'\..\sistema\exeption.php';
require_once __DIR__.'\..\sistema\connection.php';
require_once __DIR__.'\..\interfacce\query.php';

class news extends connection implements query{
    private $type;
    private $date;
    private $news;
    private $regex ="/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";


    //metodi
    public function __construct($tipo, $date, $evento =NULL){
        $this->type =parent::escaped_string($tipo);
        $this->date =parent::escaped_string($date);
        $this->news =parent::escaped_string($evento);

    }
    public function write(){
        if(empty($matches)){new exeption('error','Orario non in formato HH:MM-HH:MM.');}
        $query = "INSERT INTO eventi VALUES ('$this->type','$this->password')";
        if(parent::execute_query($query)){
            throw new exeption("correct","Modifica orari eseguita con successo.");
        }
        else{
            throw new exeption("error","Non è stato possibile inserire i nuovi orari. Riprovare più tardi.");
        }    
    }
    public function read(){
        $query = "SELECT type, descrizione FROM eventi WHERE type = '$this->type' ORDER BY ID DESC LIMIT 10";
        return mysqli_fetch_array(parent::execute_query($query));
    }
}

?>
