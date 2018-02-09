<?php
include('check_session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />

	<title>Centro Archimede</title>
	<link rel="stylesheet" type="text/css" href="../style/private_style.css" media="handheld, screen"/>
	<link rel="stylesheet" type="text/css" href="private_tablet.css" media="handheld, screen and (max-width:768px), 
    only screen and (max-device-width:768px)"/> 
    <link rel="stylesheet" type="text/css" href="private_mobile.css" media="handheld, screen and (max-width:480px), 
    only screen and (max-device-width:480px)"/>

</head>
 
<body>

	<div id="header">	    
		    <div id="titolo">
                <h3>CENTRO COMMERCIALE ARCHIMEDE</h3>
                <h1>AMMINISTRAZIONE</h1>
                
			</div>
	</div>

	<div id="menu">
        <p><a href="#content" class="accesaid">Skip navigation</a></p>
        <ul>
            <li><a  href="generale_private.php">Generale</a></li>
            <li><a href="promozioni_private.php">Promozioni</a></li>
            <li><a class="active" href="">Prodotti</a></li>
            <li><a href="negozio.php">Pagina Negozio</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul> 
    </div>

	<div id="breadcrumb">
        <h2><strong>LEGO</strong> > PRODOTTI</h2>
    </div>
    <div id="content">
            <?php 
                unset($_SESSION['flag_text']);
                $_SESSION['flag_text']='prodotti';
            ?>
        <div id="ContentPromozioni">
            <div id="ColonnaSinistra">
                <div class="NuovaPromozione">
                    <p class="intestazione">NUOVO PRODOTTO</p>
                    <form action="input_logo.php" method="post">
                        <p class="SottoTitolo">Descrizione prodotto:</p>
                        <textarea id="text" name="text" cols="30" rows="10"></textarea>
                        <p class="SottoTitolo">Seleziona il prodotto da inserire:</p>
                        <input type="file" name="fileToUpload"/>
                        <input class="submit" type="submit" value="Salva"/>                                                        
                    </form>
                </div>
            </div>
            <div id="PromozioniCorrenti">
            <p class="intestazione">PRODOTTI CORRENTI</p>
              <?php
              include("connessione_db.php");
              $user=$_SESSION["cod"];
              $query="SELECT P.promozione,P.alt FROM prodotti P WHERE username=$user LIMIT 3 ORDER BY P.ID DESC";
              $ris=mysqli_query($connessione,$query);
              while($risultato=mysqli_fetch_array($ris)) {
                $promozione=$risultato['promozione'];
                $alt=$risultato['alt'];
                echo '<div class="imgPromozione">
                    <img class="promozione" src="'.$promozione'" alt="'.$alt'"/> 
                   </div>';
                 }
                 mysqli_close($connessione);
                ?>
            </div>            
        </div>
    </div>
    <div id="footer">
    </div>
</body>
</html> 
