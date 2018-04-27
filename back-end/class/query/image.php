<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';


class image extends connection implements query{
        private $user;
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
            $this->user =$_SESSION['user'];
            if($_FILES){
                $this->name =$_FILES["immagine"]["name"];
                $this->size =$_FILES["immagine"]["size"];
                $this->error =$_FILES["immagine"]["error"];
                $this->user =$_SESSION['user'];
                $this->name =$_FILES["immagine"]["name"];
                $this->tmp_name =$_FILES["immagine"]["tmp_name"];
            }
            $this->extention= ['jpg', 'png','jpeg','gif'];
            
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
        public function write(){
            $this->store();
            $this->delete();
            $this->update();
        }
        public function read(){}
        public function delete(){
            $query="SELECT titolo FROM immagini WHERE username = '$this->user' AND titolo = '$this->type' ORDER BY data DESC";
            $file_to_delete=parent::execute_query($query);
            if(mysqli_num_rows($file_to_delete) == '3'){
                mysqli_fetch_array($file_to_delete);
                unlink($this->directory.$file_to_delete[0]);
            }
        }
        public function update(){
            $date=date("Y/m/d");
            $rename=sha1($this->name).'.'.pathinfo($this->name, PATHINFO_EXTENSION);
            $query="INSERT INTO immagini VALUES ('$this->user','$this->type','NULL','$rename','NULL','NULL','$date')";
            echo $query;
            if(parent::execute_query($query) == NULL){
                throw new exeption('error','upload fallito, si posso caricare solo immagini.');
            }
            rename($this->directory.$this->name,$this->directory.$rename);  

        }
        
    }
    
?>