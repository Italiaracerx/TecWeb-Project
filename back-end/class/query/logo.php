<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class logo extends connection implements query{
        private $user;
        private $name;
        private $type;
        private $size;
        private $tmp_name;
        private $error;
        private $destination;
        //costruttore della classe inputPicture

        public function __construct(){
            $this->user =$_SESSION['user'];
            $this->name =$_FILES["immagine"]["name"];
            $this->type =$_FILES["immagine"]["type"];
            $this->size =$_FILES["immagine"]["size"];
            $this->tmp_name =$_FILES["immagine"]["tmp_name"];
            $this->error =$_FILES["immagine"]["error"];
            $this->directory ='../../mainPage/HTML/images/logo/';
        }
        public function file_exensiont($filename) {
            $ext = explode(".", $filename);
            return $ext[count($ext)-1];  
        }
        public function write(){
            //$this->check();
            $query="SELECT logo FROM logo WHERE username = '$this->user'";
            $file_to_delete=mysqli_fetch_array(parent::execute_query($query));
            if($file_to_delete['logo']!='working_progress.png'){
                unlink($this->directory.$file_to_delete['logo']);
            }
            move_uploaded_file($this->tmp_name, $this->directory.$this->name);
            $rename=sha1($this->name).'.'.pathinfo($this->name, PATHINFO_EXTENSION);
            rename($this->directory.$this->name,$this->directory.$rename);
            $query="UPDATE logo SET logo ='$rename', alt ='logo negozio' WHERE username = '$this->user'";
            return parent::execute_query($query);
        }
        public function read(){}
    }
    
?>