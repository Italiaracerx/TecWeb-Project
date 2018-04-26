<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/image.php';


class prodotto extends image{
        private $user;
        private $name;
        private $size;
        private $tmp_name;
        private $error;
        private $destination;
        private $extention;
        private $directory;
        //costruttore della classe inputPicture

        public function __construct(){
            $this->directory ='../../mainPage/HTML/images/prodotto/';
            parent::__construct($this->directory);
            $this->user =$_SESSION['user'];
            $this->name =$_FILES["immagine"]["name"];
            $this->tmp_name =$_FILES["immagine"]["tmp_name"];
        }
        public function write(){
            parent::write();
            $this->delete();
            $this->update();
        }
        public function read(){}
        public function delete(){
            $query="SELECT titolo FROM immagini WHERE username = '$this->user' AND titolo = 'PRODOTTO'";
            $file_to_delete=parent::execute_query($query);
            if(mysqli_num_rows($file_to_delete) == '3'){
                unlink($this->directory.$file_to_delete);

            }
        }
        public function update(){
            $rename=sha1($this->name).'.'.pathinfo($this->name, PATHINFO_EXTENSION);
            $query="UPDATE logo SET logo ='$rename', alt ='logo negozio' WHERE username = '$this->user'";
            if(parent::execute_query($query) == NULL){
                throw new exeption('error','upload fallito, si posso caricare solo immagini.');
            }
            rename($this->directory.$this->name,$this->directory.$rename);  
        }
        
    }
    
?>