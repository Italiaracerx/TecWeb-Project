<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/image.php';


class promozione extends image{
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
            $this->directory ='../../mainPage/HTML/images/promozione/';
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
            $query="SELECT logo FROM logo WHERE username = '$this->user'";
            $file_to_delete=mysqli_fetch_array(parent::execute_query($query));
            if($file_to_delete['logo']!='working_progress.png'){
                unlink($this->directory.$file_to_delete['logo']);
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