<?php 
$user= $_SESSION["cod"];
include("connessione_db.php");
$query1= " SELECT * FROM orario WHERE username = '$negozio'";
            $query2= " SELECT * FROM logo WHERE username = '$negozio'";
            $query3= " SELECT * FROM info WHERE username = '$negozio'";
            $query4= " SELECT * FROM prodotti WHERE username = '$negozio'";
            $query5= " SELECT * FROM promozioni WHERE username = '$negozio'";
        
            $ris1 = mysqli_query($connessione,$query1);
            $ris2 = mysqli_query($connessione,$query2);
            $ris3 = mysqli_query($connessione,$query3);
            $ris4 = mysqli_query($connessione,$query4);
            $ris5 = mysqli_query($connessione,$query5);

            $orario=mysqli_fetch_array($ris1) or die (mysqli_error($connessione));
            $logo=mysqli_fetch_array($ris2) or die (mysqli_error($connessione));
            $info=mysqli_fetch_array($ris3) or die (mysqli_error($connessione));
mysqli_close($connessione);

?>