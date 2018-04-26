<?php
    require_once __DIR__.'/../sistema/exeption.php';
    require_once __DIR__.'/../sistema/connection.php';
    require_once __DIR__.'/../interfacce/query.php';

    /*creo una classe utile a immagazzinare dati
    * quali il file stesso, il formato 
    * dell'immagine, lo status degli errori,
    * i messaggi di errore e le directory
    * di salvataggio
    */
    class image extends connection implements query{
        private $user;
        private $name;
        private $tmp_name;
        private $error;
        private $destination;
        private $extention;
        private $size;
        private $directory;

        //costruttore della classe inputPicture
        public function __construct($where){
            $this->user =$_SESSION['user'];
            if($_FILES){
                $this->name =$_FILES["immagine"]["name"];
                $this->size =$_FILES["immagine"]["size"];
                $this->error =$_FILES["immagine"]["error"];
                $this->user =$_SESSION['user'];
                $this->name =$_FILES["immagine"]["name"];
                $this->tmp_name =$_FILES["immagine"]["tmp_name"];
            }
            $this->directory ='../../mainPage/HTML/images/'.$where.'/';
            $this->extention= ['jpg', 'png','jpeg','gif'];

        }
        public function checker(){
            if($this->error != '0'){throw new exeption('error','upload fallito, errore '.$this->error.'.');}
            //controllo se l'immagine non ha dimensione 0                
            if($this->size == false){throw new exeption('error','size nulla.');}
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
        public function write(){
            if(!move_uploaded_file($this->tmp_name, $this->directory.$this->name)){
                throw new exeption('error','upload fallito.');
            }
        }
        public function read(){

        }
        public function delete(){
            $query="SELECT logo FROM logo WHERE username = '$this->user'";
            $file_to_delete=mysqli_fetch_array(parent::execute_query($query));
            if($file_to_delete['logo']!='working_progress.png'){
                unlink($this->directory.$file_to_delete['logo']);
            }

    }