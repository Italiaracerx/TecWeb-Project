<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class logo extends connection implements query{
        private $user;
        private $page_who_call;
        private $target_dir;
        private $target_file;
        private $uploadOk;
        private $imageFileType;

        //costruttore della classe inputPicture
        public function__construct(){ /*, $nameOfFile*/
            $this->user=$_SESSION['user'];
            $this->page_who_call=$_SESSION['link'];
            $this->target_dir = "images/";
            $this->target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $this->uploadOk = 1;
            $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
        }
        //funzione per ottenere lo status del check
        public getStatus(){
            return $this->statusCheck;
        }

        /*funzione per controllare se il file da
        inserire è valido o presenta dei problemi
        */
        public function checker($fileEmpty, $imageSize){
            if(!$fileEmpty){
//controllo se l'immagine non ha dimensione 0                
                if($imageSize == false){
                    $statusCheck=1;
                    $messageError="il file non è una immagine";
                }
/*controllo che l'immagine inserita non sia troppo
* grande per essere inserita nel sito
*/
                if($imageSize>=10000000){
                    $messageError="l'immagine è troppo pesante";
                    $statusCheck=1;
                }
/*controllo che il formato dell'immagine inserito
* sia accettato dal sito
*/
                if($format != "jpg" && $format != "png" && $format != "jpeg"
                && $format != "gif"){
                    $statusCheck=1;
                    $messageError="sono ammessi solo file JPG, JPEG, PNG e GIF"
                }
            }
            else{
                $statusCheck=1;
                $messageError="il file non è valido o non è stato trovato"
            }
        }

/*funzione per immagazzinare le immagini nella 
* cartella img e inserire le rispettive voci 
* nel database
*/
        
        public function write(){
            if($statusCheck==1){
                throw new exception('error', $messageError);
            }
    /*caso inserimento logo sito
    * inserisco il corretto path in cui salvare il logo.
    * successivamente imposto il nome del file affinchè sia agilmente
    * individuabile tra i diversi loghi del sito.
    * effettuo l'inserimento del path del file tramite query sql nel database 
    * e tramite funzione php inserisco il file nella cartella img
    */
            $target_file=$this->target_dir."logo".$this->user.$this->format;
            $target_name='logo'.$this->user;

            if(move_uploaded_file($fileImage, $target_file)){
                $query="INSERT INTO logo VALUES ('$this->user', '$this->target_file', 'Logo')";
                parent::execute_query($query);
            }
            else{
                throw new exception('error', "inserimento immagine non riuscito");
            }
        }
    }
    
?>