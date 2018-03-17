<?php 

class controller{
    //metodi
    public function __construct(){}
    public function session(){
        if ($_SESSION == NULL){
            session_start();
            $_SESSION['user'] = NULL;//inizializzo a NULL l'utente corrente
            $_SESSION['type'] = NULL;//type rapprensenta il tipo di utente se messo a NULL nessun utente loggato
            $_SESSION['link'] = NULL;//indica il nome della pagina a cui questo indirizzo fa riferimento
            $_SESSION['flag'] = 0;//la flag serve per errori o altro, 0 niente da segnalare, 1 operazione avvenuta, 2 operazione fallita
            $_SESSION['flag_text'] = NULL;// campo flag_text riporta un messaggio descrivendo la flag
        }
    }
    public function check_session(){
        if ($_SESSION == NULL){
            include('config_session.php');
        }
        if($_SESSION['type'] == NULL){
            $_SESSION['flag']=2;
            $_SESSION['flag_text']="Sessione scaduta, esegui un nuovo login.";
            header("Location: login.php");
            die;
        }
    }
    public function error($text){
        session();
        $_SESSION['flag']=2;
        $_SESSION['flag_text']=$text;
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
        $controller->session();
        if($sql->mysqli_connect($this->host,$this->db_user,$this->db_psw,$this->db_name)){
            $controller->error("Login non disponibile riprovare più tardi.");
        }
        return $sql;
    }
    function execute_query($query){
        $sql=connect();
        $risultato =$connessione->mysqli_query($query);
        return $risultato->mysqli_fetch_array();
    }
    function session(){
        if ($_SESSION == NULL){
            session_start();
            $_SESSION['user'] = NULL;//inizializzo a NULL l'utente corrente
            $_SESSION['type'] = NULL;//type rapprensenta il tipo di utente se messo a NULL nessun utente loggato
            $_SESSION['link'] = NULL;//indica il nome della pagina a cui questo indirizzo fa riferimento
            $_SESSION['flag'] = 0;//la flag serve per errori o altro, 0 niente da segnalare, 1 operazione avvenuta, 2 operazione fallita
            $_SESSION['flag_text'] = NULL;// campo flag_text riporta un messaggio descrivendo la flag
        }
    }
    function check_session(){
        if ($_SESSION == NULL){
            include('config_session.php');
        }
        if($_SESSION['type'] == NULL){
            $_SESSION['flag']=2;
            $_SESSION['flag_text']="Sessione scaduta, esegui un nuovo login.";
            header("Location: login.php");
            die;
        }
    }
    function error($text){
        session();
        $_SESSION['flag']=2;
        $_SESSION['flag_text']=$text;
    }

}

class log extends connection{
    //campi privati
    private $username;
    private $password;
    private $confirm;

    //metodi
    public function __construct($user,$psw1, $psw2){
        $this->username =$user;
        $this->password =$psw1;
        $this->confirm =$psw2;
    }
    public function write(){
        if($password != $confirm){
            $this->controller->error("Login e password errati");
        }
        else{
            $query = " SELECT A.username, T.user_type, T.link FROM account A INNER JOIN type_account T ON A.type = T.user_type WHERE username = $this->user AND password = $this->password";

        }
    }


}

connection::$host = "localhost";
connection::$db_user = "root";
connection::$db_psw = "";
connection::$db_name = "archimede";


?>