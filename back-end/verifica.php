<?php

session_start();//apro la sessione

include("connessione_db.php");//apro la connessione con il database
echo $_SESSION['flag'];
if($_SESSION['flag'] == 0){
  //variabili POST con anti sql Injection
  $username=mysqli_real_escape_string($connessione,$_POST['username']);
  $password=mysqli_real_escape_string($connessione,$_POST['password']);
  $errore=false;
  $password= hash('sha1',$password);//eseguo l'hash della password con l'algo sha1
  $query = " SELECT A.username, T.user_type, T.link FROM account A INNER JOIN type_account T ON A.type = T.user_type WHERE username = '$username' AND password = '$password' ";
  if($risultato = mysqli_query($connessione,$query)){
    $utente=mysqli_fetch_array($risultato);
    if($utente['username'] != NULL){
      //setto nell'array di sessione le informazioni
      $_SESSION['user']=$utente['username'];
      $_SESSION['type']=$utente['user_type'];
      $_SESSION['link']=$utente['link'];
      $_SESSION['flag']=1;
      $_SESSION['flag_text']="Login effettuato con successo. Benvenuto ".$utente['username'];
      header("Location: ".$_SESSION['link'].".php");
    }
    else{
      $errore=true;
      $_SESSION['flag_text']="Username o Password non corretti.";
    }
  }
  else{
    $errore=true;
    $_SESSION['flag_text']="Login non disponibile riprovare più tardi.";
  }
}
else{
  $errore=true;
  $_SESSION['flag_text']="Login non disponibile riprovare più tardi.";
}
if($errore == true){
  $_SESSION['flag']=2;
  header("Location: login.php");
}

mysqli_close($connessione);

?>