<?php
require_once("controller.php");
require_once("exeption.php");

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
connection::$host = "localhost";
connection::$db_user = "root";
connection::$db_psw = "";
connection::$db_name = "archimede";

?>