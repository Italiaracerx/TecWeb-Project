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
    class inputPicture implements query extends connection{
        private $user;
        private $page_who_call;
        private $desc;
        private $fileImage;
        private $format;
        private $target_dir = "images/";
        private $target_file;
        private $statusCheck;
        private $messageError;

        //costruttore della classe inputPicture
        public function__construct($actualUser, $actualPage, $description='', $fileImageToCharge, $fileType){ /*, $nameOfFile*/
            $this->user=$actualUser;
            $this->page_who_call=$actualPage;
            $this->desc=$description;
            $this->fileImage=$fileImageToCharge;
            $this->format=parent::escaped_string($fileType);
            $this->statusCheck=0;
        }
        //funzione per ottenere lo status del check
        public getStatus()const{
            return $this->statusCheck;
        }

        /*funzione per controllare se il file da
        *inserire è valido o presenta dei problemi
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
            if($page_who_call=='PaginaGenerale'){
                $target_file=$target_dir."logo".$user.$format;
                $target_name="logo.$user";
                /*$query="SELECT * FROM logo WHERE username='$user'";
                $result=parent::execute_query($query);*/ ///////////////////////////////////UTILE??
                if(move_uploaded_file($fileImage, $target_file)&& !$log=mysqli_fetch_array($ris)){
                    $query="INSERTO INTO logo VALUES ('$user', '$target_file', '$target_name');";
                    parent::execute_query($query);
                }
                else
                        throw new exception('error', "inserimento immagine non riuscito");
            }
/*caso inserimento promozione di un negozio
* effettuo un conteggio delle promozioni presenti all'interno del database 
* per un dato negozio del centro commerciale.
* se il conteggio è di 3 promozioni allora effettuo una sostituzione della 
* immagine già presente e aggiorno data di inserimento e descrizione della promozione.
* se il numero di promozioni è invece inferiore a 3 allora effettuo 
* un nuovo inserimento dell'immagine della promozione e aggiungo una entry
* nella tabella del database con nome e path corretti.
*/
            if($page_who_call=='promozioni'){
                $query="SELECT * FROM promozioni WHERE username='$user'";
                $ris=parent::execute_query($query);
                $counter=0;
                while($result=myqsli_fetch_array($ris)){
                    $counter++;
                }
                if($counter==3){
                    $query="SELECT * FROM promozioni WHERE username='$user' ORDER BY data ASC LIMIT 1;"
                    $ris=parent::execute_query($query);
                    $result=mysqli_fetch_array($ris);
                    $target_file=$result['promozione']; //recupero il path corretto da quello già presente in tabella
                    if(move_uploaded_file($fileImage, $target_file)){
                        $query="UPDATE promozioni SET alt='$desc', data=CURRENT_TIME WHERE promozione='$target_file' AND username='$user';"
                        parent::execute_query($query);
                    }
                    else
                        throw new exception('error', "inserimento immagine non riuscito");
                }
                else{
                    $counter++; //utile per riconoscere rapidamente il numero di promozione dell'immagine
                    $target_file=$target_dir."promozione".$user."_".$counter.".".$format;
                    if(move_uploaded_file($fileImage), $target_file){
                        $query="INSERT INTO promozioni VALUES ('$user', '$target_file','$desc', DEFAULT);";
                        parent::execute_query($query);
                        }
                    }
                    else
                        throw new exception('error', "inserimento immagine non riuscito");
                }

/*caso inserimento prodotto di un negozio
* effettuo un conteggio delle promozioni presenti all'interno del database 
* per un dato negozio del centro commerciale.
* se il conteggio è di 3 prodotti allora effettuo una sostituzione della 
* immagine già presente e aggiorno data di inserimento e descrizione del prodotto.
* se il numero di prodotti è invece inferiore a 3 allora effettuo 
* un nuovo inserimento dell'immagine del prodotto e aggiungo una entry
* nella tabella del database con nome e path corretti.
*/
            if($page_who_call=='prodotti'){
                $query="SELECT * FROM prodotti WHERE username='$user'";
                $ris=mysli_query($connessione, $query);
                $counter=0;
                while($result=mysqli_fetch_array($ris)){
                    counter++;
                }
                if($number>=3){
                    $query="SELECT * FROM prodotti WHERE username='$user' ORDER BY data ASC LIMIT 1;";
                    $ris=parent::execute_query($query);
                    $result=mysqli_fetch_array($ris);
                    $target_file=$ris['prodotto'];
                   if(move_uploaded_file($fileImage, $target_file)){
                        $query="UPDATE prodotti SET alt='$desc', data=CURRENT_TIME WHERE prodotto='$target_file' AND username='$user';";
                        parent::execute_query($query);
                    }
                    else
                        throw new exception('error', "inserimento immagine non riuscito");
                }
                else{
                    $number++; //utile per riconoscere rapidamente il numero di prodotto dell'immagine
                    $target_file=$target_dir."prodotto".$user."_".$number.".".$format;
                    if(move_uploaded_file($fileImage, $target_file)){
                        $query="INSERT INTO prodotti VALUES ('$user', '$target_file','$desc', DEFAULT);";
                        parent::execute_query($query);
                    }
                    else
                        throw new exception('error', "inserimento immagine non riuscito");
                }
            }

        }
    }
    
?>