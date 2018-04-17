<?php 

require_once("\exeption.php");
require_once("\connection.php");
require_once("\query.php");

class orario extends connection implements query{
    //campi privati
    private $giorni = ['lunedi', 'martedi', 'mercoledi', 'giovedi', 'venerdi', 'sabato', 'domenica'];
    private $apertura =510;
    private $chiusura =1350;
    private $regex ='/^(?:2[0-3]|[01][0-9]):[0-5][0-9]-(?:2[0-3]|[01][0-9]):[0-5][0-9]$/';

    //metodi
    public function __construct(){
        parent::__construct();
        for($i=0; $i<7; $i++){
            $this->orari[$i]=parent::escaped_string($_POST[$orari[$i]]);
        }
    }


    public function write(){
        for($i=0; $i<7  && !$sent; $i++){
            preg_match($this->regex, orari[$i], $matches, PREG_OFFSET_CAPTURE);
            if(empty($matches)){new exeption('error','Orario non in formato HH:MM-HH:MM.');}
            else{
                $arr1 = str_split($this->orari[$i]);
                $new_apertura=$arr1[0]*10+$arr1[1]+$arr1[4]*10+$arr1[5];
                $new_orachiusura=$arr1[7]*10+$arr1[8]+$arr1[10]*10+$arr1[11]; 

                if($newapertura > $newchiusura){
                    throw new exeption("error","L'orario di apertura è maggiore dell'orario di chiusura.");
                }
                if($oraapertura < $this->apertura || $orachiusura < $this->chiusura){
                    throw new exeption("error","L'apertura e la chiusura non possono precedere o succedere a quelle del centro commerciale.");
                }
            }
            $user =$_SESSION['user'];
            $query = "UPDATE orario SET 
            $this->giorno[0]=$this->orari[0],
            $this->giorno[1]=$this->orari[1],
            $this->giorno[2]=$this->orari[2],
            $this->giorno[3]=$this->orari[3],
            $this->giorno[4]=$this->orari[4],
            $this->giorno[5]=$this->orari[5],
            $this->giorno[6]=$this->orari[6] WHERE username = $user";
            
            if(parent::execute_query($query)){
                throw new exeption("correct","Modifica orari eseguita con successo.");
            }
            else{
                throw new exeption("error","Non è stato possibile inserire i nuovi orari. Riprovare più tardi.");
            }
        }
    }
    public function read(){
        $controller->session();
        $user =$_SESSION['user'];
        $query = "SELECT * FROM orario WHERE username = $user";
        return mysqli_fetch_array(parent::execute_query($query));
    }
}

?>
