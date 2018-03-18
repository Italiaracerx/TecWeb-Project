<?php 

class exeption{
    private $flag;
    private $text_flag;

    public function __construct($fl=NULL,$t_fl=NULL){
        $this->flag =$fl;
        $this->text_flag =$t_fl;
    }
    public function getFlag(){
        return $this->flag;
    }
    public function getText_flag(){
        return $this->text_flag;
    }
}


class controller{
    //metodi
    public function print_bar(){
        if($_SESSION['flag'] != NULL){
            echo '<h2 id="'.$_SESSION['flag'].'">'.$_SESSION['flag_text'].'</h2>';
            $this->set_flag(new exeption());
        }
    }
    public function set_flag(exeption $ex){
        $_SESSION['flag']=$ex->getFlag();        //la flag serve per errori o altro, 0 niente da segnalare, 1 operazione avvenuta, 2 operazione fallita
        $_SESSION['flag_text']=$ex->getText_flag();   // campo flag_text riporta un messaggio descrivendo la flag
    }
    public function session(){
        $_SESSION['user'] = NULL;//inizializzo a NULL l'utente corrente
        $_SESSION['type'] = NULL;//type rapprensenta il tipo di utente se messo a NULL nessun utente loggato
        $_SESSION['link'] = NULL;//indica il nome della pagina a cui questo indirizzo fa riferimento
        $this->set_flag(new exeption());
    }
    public function check_session(){
        session_start();
        if (!empty($_SESSION)){
            $this->session();
        }
        elseif($_SESSION['type'] == NULL){
            $this->set_flag(new exeption("error","Sessione scaduta, esegui un nuovo login."));
            header("Location: login.php");
        }
        else{
            $this->set_flag(new exeption("correct","Bentornato"));
            header("Location: ".$_SESSION['link'].".php");
        }
    }
    public function define_session($utente){
        //setto nell'array di sessione le informazioni
        $_SESSION['user']=$utente['username'];
        $_SESSION['type']=$utente['user_type'];
        $_SESSION['link']=$utente['link'];
        $this->set_flag(new exeption("correct","Login effettuato con successo. Benvenuto ".$utente['username']));
        header("Location: ".$_SESSION['link'].".php");
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy(); 
        header("Location: login.php");
    }
}

class connection{
    //campi privati
    private static $host ="localhost";
    private static $db_user ="root";
    private static $db_psw ="";
    private static $db_name ="archimede";
    protected $controller;

    //metodi
    public function __construct(){
        $this->controller = new controller();
    }
    public function connect(){
        $this->controller->session();
        if($sql->mysqli_connect($this->host,$this->db_user,$this->db_psw,$this->db_name)){
            throw new exeption("error", "connessione non riuscita");
        }
        return $sql;
    }
    function execute_query($query){
        try{
            $sql=$this->connect();
            $result =$sql->mysqli_query($query);
            $sql->mysqli->close();
            return $result;
        }
        catch(exeption $ex){
            $this->controller->set_flag($ex);
        }
    }
}

class log extends connection{
    //campi privati
    private $username;
    private $password;
    private $confirm;

    //metodi
    public function __construct($user,$psw1, $psw2=0){
        parent::__construct();
        $this->username =mysqli::real_escape_string($user);
        $this->password =hash('sha1',mysqli::real_escape_string($psw1));
        $this->confirm =hash('sha1',mysqli::real_escape_string($psw2));
    }
    public function write(){
        $controller->session();
        $query = "INSERT INTO account VALUES ('$this->username','user','$this->password')";
        if(parent::execute_query($query)){
            $this->controller->set_flag(new exeption("correct","Scrittura eseguita con successo."));
        }
        else{
            $this->controller->set_flag(new exeption("error","Scrittura non eseguita."));
        }
    }
    public function read(){
        $controller->session();
        $query = "SELECT A.username, T.user_type, T.link FROM account A INNER JOIN type_account T ON A.type = T.user_type WHERE username = $this->user AND password = $this->password";
        $utente=mysqli_fetch_array(parent::execute_query($query));
        if($utente['username'] != NULL){
            $this->controller->define_session($utente);
        }
        else{
            $this->controller->set_flag(new exeption("error","Login e password errati"));
        }
    }
}
/*
connection::$host = "localhost";
connection::$db_user = "root";
connection::$db_psw = "";
connection::$db_name = "archimede";
*/

?>