<?php 
$user= $_SESSION["cod"];
include("connessione_db.php");
$query1= " SELECT * FROM orario WHERE username = '$user'";
            $query2= " SELECT * FROM logo WHERE username = '$user'";
            $query3= " SELECT * FROM info WHERE username = '$user'";
            $query4= " SELECT * FROM prodotti WHERE username = '$user'";
            $query5= " SELECT * FROM promozioni WHERE username = '$user'";
        
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