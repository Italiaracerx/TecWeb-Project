
<?php

$host = "localhost";
 
$db_user = "root";
 
$db_psw = "";
 
$db_name = "CentroArchimede";

$username = [];

$password = []; 

$connessione = [];

//apro la connessione con server mysql
$connessione = mysqli_connect($host,$db_user,$db_psw);

//collego al database
mysqli_select_db($connessione,$db_name); 

?>