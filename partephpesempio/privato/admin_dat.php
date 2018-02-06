<?php 
$user= $_SESSION["cod"];
include("connessione_db.php");
$query = " SELECT * FROM orario WHERE username = '$user' ";
$ris = mysqli_query($connessione,$query) or die (mysqli_error($connessione));
$riga=mysqli_fetch_array($ris);  

mysqli_close($connessione);

?>