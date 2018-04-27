<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';


class image extends connection implements query{
        private $user;

        private $name_image;
        private $alt;
        private $start =NULL;
        private $finish =NULL;
        private $description;

        private $name;
        private $size;
        private $tmp_name;
        private $error;
        private $destination;
        private $extention;
        private $directory;
        private $type;
        //costruttore della classe inputPicture

        public function __construct($type){
            $this->type =$type;
            $this->directory ='../../mainPage/HTML/images/'.$this->type.'/';
            $this->extention= ['jpg', 'png','jpeg','gif'];
        }
        public function take_data(){
            if($_POST){
                $this->name_image =$_POST['nome'];
                $this->alt =$_POST['alt'];
                if($this->type =='promozione'){
                    $this->start =$_POST['start'];
                    $this->finish =$_POST['finish'];
                }
                $this->description =$_POST['description'];
            }
            if($_SESSION){
                $this->user =$_SESSION['user'];
            }
            if($_FILES){
                $this->name =$_FILES["immagine"]["name"];
                $this->size =$_FILES["immagine"]["size"];
                $this->error =$_FILES["immagine"]["error"];
                $this->user =$_SESSION['user'];
                $this->name =$_FILES["immagine"]["name"];
                $this->tmp_name =$_FILES["immagine"]["tmp_name"];
            }
        }
        public function checker(){
            if($this->error != '0'){throw new exeption('error','upload fallito, errore '.$this->error.'.');}
            //controllo se l'immagine non ha dimensione 0                
            if($this->size == false || $this->name == NULL){throw new exeption('error','size nulla.');}
            /*controllo che l'immagine inserita non sia troppo
            * grande per essere inserita nel sito
            */
            if($this->size >= 10000000){throw new exeption('error','immagine troppo grande.');}
            /*controllo che il formato dell'immagine inserito
            * sia accettato dal sito
            */
            
            $sent =false;
            foreach($this->extention as $formato){
                if(pathinfo($this->name, PATHINFO_EXTENSION) == $formato){
                    $sent=true;
                }
            }
            if(!$sent){throw new exeption('error','upload fallito, si posso caricare solo immagini.');}
        }

        public function store(){
            $this->checker();
            if(!move_uploaded_file($this->tmp_name, $this->directory.$this->name)){
                throw new exeption('error','upload fallito.');
            }
        }
        public function read(){
            $query="SELECT titolo FROM immagini WHERE username = '$this->user' AND type = '$this->type'";
            if($this->user == NULL){
                $query="SELECT titolo FROM immagini WHERE type = '$this->type'";
            }
            return parent::execute_query($query);
        }
        public function how_much(){
            $result =$this->read();
            if(mysqli_num_rows($result) == '3'){
                throw new exeption('error','inserimento '.$this->type.' fallito, eliminane uno per inserirne quello nuovo.');
            }
        }
        public function write(){
            $this->how_much();
            $this->store();
            $this->insert();
        }
        public function delete(){
            $delete =$_POST['immagine'];
            $query="DELETE FROM immagini WHERE type = '$this->type' AND titolo = '$delete'";
            $file_to_delete=parent::execute_query($query);
            unlink($this->directory.$delete);
        }
        public function insert(){
            $date=date("Y/m/d");
            $rename=sha1($this->name).'.'.pathinfo($this->name, PATHINFO_EXTENSION);
            $insert_immagine="INSERT INTO immagini VALUES ('$this->user','$this->type','NULL','$rename','$this->name_image','$this->alt','$this->start','$this->finish','$this->description','$date')";
            echo $insert_immagine;
            if(parent::execute_query($insert_immagine) == NULL){
                throw new exeption('error','upload fallito, si posso caricare solo immagini.');
            }
            rename($this->directory.$this->name,$this->directory.$rename);  
        }
        
    }
    
?>