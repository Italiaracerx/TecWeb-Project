<?php 
class question{
    function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    function is_log($connection)
    {
        $query = " SELECT A.username, T.user_type, T.link FROM account A INNER JOIN type_account T ON A.type = T.user_type WHERE username = $this->username AND password = $this->password ";
    }
}
class connection{
    private $host;
    private $db_user;
    private $db_psw;
    private $db_name;

    public function __construct(question $question){
        $this->host = "localhost";
        $this->db_user = "root";
        $this->db_password = "";
        $this->db_name = "archimede";
    }
    function execute_query(){
        $connessione->mysqli_connect($this->host,$this->db_user,$this->db_psw);
        $connessione->mysqli_select_db($this->db_name);
        $risultato =$connessione->mysqli_query($query);
        return $risultato->mysqli_fetch_array();
    }

}

?>