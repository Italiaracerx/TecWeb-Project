<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class orario extends connection implements query{
    //campi privati
    private $numeri;
    private $giorni;
    private $giorni_html;
    private $orari;
    private $apertura =510;
    private $chiusura =1350;
    private $regex ='/^(?:2[0-3]|[01][0-9]):[0-5][0-9]-(?:2[0-3]|[01][0-9]):[0-5][0-9]$/';
    private $user;

    //metodi
    public function __construct($user){
        $this->user =$user;
        $this->numeri = ['uno','due','tre','quattro','cinque','sei','sette'];
        $this->giorni = ['lunedi', 'martedi', 'mercoledi', 'giovedi', 'venerdi', 'sabato', 'domenica'];
        $this->giorni_html = ['Luned&igrave;', 'Marted&iacute;', 'Mercoled&iacute;', 'Gioved&iacute;', 'Venerd&iacute;', 'Sabato', 'Domenica'];

        if(!empty($_POST)){
            $this->orari = array();
            for($i=0; $i<7; $i++){
                $this->orari[$i]=parent::escaped_string($_POST[$this->giorni[$i]]);
            }
        }
    }


    public function update(){
        for($i=0; $i<7; $i++){
            preg_match($this->regex, $this->orari[$i], $matches, PREG_OFFSET_CAPTURE);
            if(empty($matches)){new exeption('error','Orario non in formato HH:MM-HH:MM.');}
            else{
                $arr1 = str_split($this->orari[$i]);
                $new_apertura=($arr1[0]*10+$arr1[1])*60+$arr1[3]*10+$arr1[4];
                $new_orachiusura=($arr1[6]*10+$arr1[7])*60+$arr1[9]*10+$arr1[10]; 

                if($new_apertura > $new_orachiusura){
                    throw new exeption("error","L'orario di apertura è maggiore dell'orario di chiusura.");
                }
                if($new_apertura < $this->apertura || $new_orachiusura > $this->chiusura){
                    throw new exeption("error","L'apertura e la chiusura non possono precedere o succedere quelle del centro commerciale.");
                }
            }
        }
        $query = 'UPDATE orario SET'; 
        for($i=0; $i<7; $i++){
            if($i != 0){
                $query=$query.', ';
            }
            else{
                $query =$query.' ';
            }
            $query =$query.$this->giorni[$i].'='.'"'.$this->orari[$i].'"';
        }
        $query=$query.' WHERE username = "'.$this->user.'"';
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }
    public function read(){
        $query = 'SELECT ';
        for($i=0; $i<7; $i++){
            if($i != 0){
                $query=$query.', ';
            }

            $query =$query.$this->giorni[$i];
        }
        $query =$query." FROM orario WHERE username = '$this->user'";

        return parent::execute_query($query);
    }
    public function write(){}
    public function getGiorni(){
        return $this->giorni;
    }
    public function getNumeri(){
        return $this->numeri;
    }
    public function getGiorniHTML(){
        return $this->giorni_html;
    }
}

?>
