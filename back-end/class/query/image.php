<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/ImageManipulator.php';

class image extends connection implements query{
        private $user;

        private $name_image;
        private $alt;
        private $start =NULL;
        private $finish =NULL;
        private $description;

        private $name;
        private $size;
        private $imageHeight;
        private $imageWidth;
        private $tmp_name;
        private $error;
        private $destination;
        private $extention;
        private $directory;
        private $type;
        private $regex= '/^(?:(((([012][0-9]|(3[01]))\-(((0[13578]))|(1[02])))|(([012][0-9]|(3[0]))\-(((0[469]))|(1[1])))|((([01][0-9])|2[0-7])\-02))\-2((01[89])|(0[2-9]\d)|(1\d{2}))))/'; 

        //costruttore della classe inputPicture

        public function __construct($type, $user = NULL){
            $this->user =$user;

            $this->type =$type;
            $this->directory ='../../mainPage/HTML/images/'.$this->type.'/';
            $this->extention= ['jpg', 'png','jpeg','gif', 'JPG'];
        }
        public function take_data(){
            if($_POST){
                $this->name_image =parent::escaped_string($_POST['nome']); 
                $this->alt =$_POST['alt'];
                if($this->type =='promozione'){
                    $this->start =$_POST['start'];
                    $this->finish =$_POST['finish'];
                }
                $this->description =$_POST['description'];
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
            if($this->type=='promozione'){
                preg_match($this->regex, $this->start, $okstart, PREG_OFFSET_CAPTURE); 
                if(empty($okstart)){throw new exeption('error','data non in formato GG-MM-AAAA o non calendarizzato');} 
                preg_match($this->regex, $this->finish, $okfinish, PREG_OFFSET_CAPTURE); 
                if(empty($okfinish)){throw new exeption('error','data non in formato GG-MM-AAAA o non calendarizzato');} 
                $startdate=str_replace("-", "", $this->start); 
                $enddate=str_replace("-", "", $this->finish); 
                $arraystart=str_split($startdate, 2); 
                $arrayend=str_split($enddate, 2); 
                
                if(($arraystart[3]>=$arrayend[3]) && ($arraystart[2]>=$arrayend[2])){ 
                    if($arraystart[1]>=$arrayend[1]){ 
                        if($arraystart[0]>$arrayend[0]){throw new exeption('error','Data di fine precedente a quella di inizio');} 
                    } 
                } 
            } 
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

        public function read($limit = NULL){
            $query="SELECT source, titolo, alt FROM immagini WHERE username = '$this->user' AND type = '$this->type'";
            if($this->user == NULL){
                $query="SELECT I.source, F.negozio, I.alt FROM immagini I JOIN info F WHERE I.type = '$this->type' AND I.username = F.username LIMIT 6";
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
            $this->checker();
            $this->how_much();
            $this->resize_and_store();
            $this->insert();
        }
        public function delete(){
            $delete =$_POST['titolo'];
            $query_to_delete="SELECT source FROM immagini WHERE username = '$this->user' AND type = '$this->type' AND titolo = '$delete'";
            $file_to_delete=mysqli_fetch_array(parent::execute_query($query_to_delete));
            $query="DELETE FROM immagini WHERE type = '$this->type' AND titolo = '$delete'";
            if(parent::execute_query($query)){
                if(!unlink($this->directory.$file_to_delete['source'])){
                    throw new exeption('error','upload fallito, riprovare più tardi.');
                }
            }
        }
        public function insert(){
            $date=date("Y/m/d");
            $rename=sha1($this->name.$this->user).'.'.pathinfo($this->name, PATHINFO_EXTENSION);
            $insert_immagine="INSERT INTO immagini VALUES ('$this->user','$this->type','NULL','$rename','$this->name_image','$this->alt','$this->start','$this->finish','$this->description','$date')";
            if(parent::execute_query($insert_immagine) == NULL){
                unlink($this->directory.$this->name);
                throw new exeption('error','upload fallito, riprovare più tardi.');
            }
            else{
                rename($this->directory.$this->name,$this->directory.$rename);
            }
        }

        public function resize_and_store(){
            $manipulator = new ImageManipulator($this->tmp_name);
            $width  = $manipulator->getWidth();
            $height = $manipulator->getHeight();

            $size = min($width, $height);
            $size = $size/2;
            
            $centreX = round($width / 2);
            $centreY = round($height / 2);
            // our dimensions will be define a square

            $x1 = $centreX - $size;
            $y1 = $centreY - $size;
     
            $x2 = $centreX + $size;
            $y2 = $centreY + $size;

            // center cropping to 200x130
            $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
            // saving file to uploads folder
            $manipulator->save($this->directory.$this->name);
        }
    }
    
?>