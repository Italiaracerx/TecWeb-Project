<?php

//Mi connetto al MySql Server 
$myconn = mysql_connect('localhost', 'root', 'xyz') or die("Errore..."); 
//Mi connetto al database degli amici 
mysql_select_db('officina', $myconn) or die("Errore..."); 
//Imposto ed eseguo la query 
$query = "SELECT NomeFornitore, Contatti FROM fornitore"; 
$result = mysql_query($query, $myconn) or die("Errore..."); 
//conto il numero di occorrenze trovate nel db 
$numrows = mysql_num_rows($result);
//se il database è vuoto lo stampo a video 
if ($numrows==0){
  echo "Database vuoto!";
}
//Se invece trovo delle occorrenze... 
else
{ 
  //Avvio un ciclo for che si ripete per il numero di occorrenze trovate 
  for($x=0; $x<$numrows; $x++){
  //Recupero il contenuto di ogni record rovato 
    $resrow = mysql_fetch_row($result);
    $NomeFornitore = $resrow[0]; 
    $Contatto = $resrow[1]; 
 
    //Stampo il risultato 
    echo "NomeFornitore: <b>" . $NomeFornitore . "</b><br/>"; 
    echo "Contatto: <b>" . $Contatto . "</b><br/>"; 
  } 
}

?> 
