<?php 
require_once("controller.php");
require_once("exeption.php");
require_once("connection.php");


class orario extends connection{
    //campi privati
    private static $giorni = ['lunedi', 'martedi', 'mercoledi', 'giovedi', 'venerdi', 'sabato', 'domenica'];
    private static $apertura =510;
    private static $chiusura =1350;

    private $orari =[];

    //metodi
    public function __construct(){
        parent::__construct();
        $controller->session();
        for($i=0; $i<7; $i++){
            $this->orari[$i]=mysqli::real_escape_string($_POST[$orari[$i]]);
        }
    }
    public function write(){
        $sent = false;
        for($i=0; $i<7  && !$sent; $i++){
            $arr1 = str_split($this->orari[$i]);
            $oraapertura=$arr1[0]*10+$arr1[1];
            $minutiapertura=$arr1[4]*10+$arr1[5];
            $orachiusura=$arr1[7]*10+$arr1[8]; 
            $minutichiusura=$arr1[10]*10+$arr1[11];
            $newapertura=$oraapertura*60+$minutiapertura;
            $newchiusura=$orachiusura*60+$minutichiusura;

            if(!$sent && ($oraapertura > 23 || $orachiusura > 23)){
                $sent=true;
                $controller->set_flag(new exeption("error","Orario non valido"));
            }
            if(!$sent && ($minutiapertura > 59 || $minutiorachiusura > 59)){
                $sent=true;
                $controller->set_flag(new exeption("error","Orario non valido"));
            }
            if(!$sent && ($newapertura > $newchiusura)){
                $sent=true;
                $controller->set_flag(new exeption("error","Orario non valido"));
            }
            if(!$sent && ($oraapertura < $this->apertura || $orachiusura < $this->chiusura)){
                $sent=true;
                $controller->set_flag(new exeption("error","Orario non valido"));
            }
            if(!$sent && $arr1[3] != ":" && $arr1[6] != "-" && $arr1[9] != ":" ){
                $sent=true;
                $controller->set_flag(new exeption("error","Orario non valido"));                
            }
        }
        if(!$set){
            $user =$_SESSION['user'];
            $query = "UPDATE orario SET $this->giorno[0]=$this->orari[0],
            $this->giorno[1]=$this->orari[1],
            $this->giorno[2]=$this->orari[2],
            $this->giorno[3]=$this->orari[3],
            $this->giorno[4]=$this->orari[4],
            $this->giorno[5]=$this->orari[5],
            $this->giorno[6]=$this->orari[6] WHERE username = $user";
            if(parent::execute_query($query)){
                $this->controller->set_flag(new exeption("correct","Scrittura eseguita con successo."));
            }
            else{
                $this->controller->set_flag(new exeption("error","Scrittura non eseguita."));
            }
        }
    }
    public function read(){
        $controller->session();
        $user =$_SESSION['user'];
        $query = "SELECT * FROM orario WHERE username = $user";
        $orari=mysqli_fetch_array(parent::execute_query($query));
        if($orari){
            $this->controller->define_session($utente);
        }
        else{
            $this->controller->set_flag(new exeption("error","orari non disponibili"));
        }
    }
}

?>