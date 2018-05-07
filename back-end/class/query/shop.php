<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class shop extends connection implements query{
    private $name;



    //metodi
    public function __construct(){
        $this->name =NULL;
        if(isset($_GET['shop'])){
            $this->name =$_POST['shop'];
        }
    }
    public function write(){}
    public function alone(){
        $logo ="SELECT * FROM logo L WHERE L.username = '$this->name'";
        $info ="SELECT * FROM info I WHERE I.username = '$this->name'";
        $orario ="SELECT * FROM orario O WHERE O.username = '$this->name'";
        $prodotto ="SELECT * FROM immagini I WHERE I.username = '$this->name' AND I.type = 'prodotto'";
        $promozione ="SELECT * FROM immagini I WHERE I.username = '$this->name' AND I.type = 'promozione'";
        

    }    
    public function all(){
        $query = "SELECT L.username, L.logo, L.alt, I.negozio FROM logo L JOIN info I ON L.username = I.username";
        return parent::execute_query($query);
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
