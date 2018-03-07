<?php

$host = "localhost";
 
$db_user = "root";
 
$db_psw = "";
 
$db_name = "archimede";

//apertura della connessione con server mysql

    $connessione = mysqli_connect($host,$db_user,$db_psw);
    if(!$connessione){
        $_SESSION['flag']=2;
        $_SESSION['flag_text']="Login non disponibile riprovare più tardi.";
    }

    //collegamento al database
    if(!mysqli_select_db($connessione,$db_name)){
        $_SESSION['flag']=2;
        $_SESSION['flag_text']="Login non disponibile riprovare più tardi.";
    } 

?>