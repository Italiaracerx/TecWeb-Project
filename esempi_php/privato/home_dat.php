<?php 
include("connessione_db.php");
$query = " SELECT * FROM orario WHERE username = 'admin' ";
$ris = mysqli_query($connessione,$query) or die (mysqli_error($connessione));
$riga;
$riga=mysqli_fetch_array($ris);  


mysqli_close($connessione);

?>