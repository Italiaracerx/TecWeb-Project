<?php 

class controller{
    //metodi
    public function set_flag($flag,$text=NULL){
        session();
        $_SESSION['flag']=$flag;        //la flag serve per errori o altro, 0 niente da segnalare, 1 operazione avvenuta, 2 operazione fallita
        $_SESSION['flag_text']=$text;   // campo flag_text riporta un messaggio descrivendo la flag
    }
    public function session(){
        if ($_SESSION == NULL){
            session_start();
            $_SESSION['user'] = NULL;//inizializzo a NULL l'utente corrente
            $_SESSION['type'] = NULL;//type rapprensenta il tipo di utente se messo a NULL nessun utente loggato
            $_SESSION['link'] = NULL;//indica il nome della pagina a cui questo indirizzo fa riferimento
            set_flag(0);
        }
    }
    public function check_session(){
        if ($_SESSION == NULL){
            session();
        }
        elseif($_SESSION['type'] == NULL){
            set_flag(2,"Sessione scaduta, esegui un nuovo login.");
            header("Location: login.php");
        }
        else{
            set_flag(1,"Bentornato");
            header("Location: ".$_SESSION['link'].".php");
        }
    }
    public function define_session($utente){
        //setto nell'array di sessione le informazioni
        $_SESSION['user']=$utente['username'];
        $_SESSION['type']=$utente['user_type'];
        $_SESSION['link']=$utente['link'];
        $_SESSION['flag']=1;
        $_SESSION['flag_text']="Login effettuato con successo. Benvenuto ".$utente['username'];
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
    private static $host;
    private static $db_user;
    private static $db_psw;
    private static $db_name;
    protected $controller;

    //metodi
    public function __construct(){
        $this->controller = new controller();
    }
    public function connect(){
        $this->controller->session();
        if($sql->mysqli_connect($this->host,$this->db_user,$this->db_psw,$this->db_name)){
            $controller->set_flag(2,"Login non disponibile riprovare più tardi.");
            die;
        }
        return $sql;
    }
    function execute_query($query){
        $sql=connect();
        $result =$sql->mysqli_query($query);
        $sql->mysqli->close();
        return $result;
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
            $this->controller->set_flag(1, "Scrittura eseguita con successo.")
        }
        else{
            $this->controller->set_flag(2, "Scrittura non eseguita.")
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
            $this->controller->set_flag(2,"Login e password errati"); 
        }
    }
}

connection::$host = "localhost";
connection::$db_user = "root";
connection::$db_psw = "";
connection::$db_name = "archimede";


?>