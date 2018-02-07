<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<!-- Specifico il charset -->
	<title>Centro Archimede</title>
	<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />
	<link rel="stylesheet" type="text/css" href="../style/style.css" media="handheld, screen"/>
	<link rel="stylesheet" type="text/css" href="mobile.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)"/><!--per dispositivi mobili-->
    <link rel="stylesheet" type="text/css" href="tablet.css" media="handheld, screen and (max-width:710px) and (min-width:481px),
	only screen and (max-width:705px) and (min-width:481px)"/><!--TABLET-->
	<link rel="stylesheet" type="text/css" href="print.css" media="print"/><!--STAMPA-->

</head>

<body>
	   <div id="header">       
        <div id="contenutoHeader">
            <img id="logo" alt="logo" src="../images/logo.jpg"/>                      
            <div id="titolo">
                <h1>Archimede</h1>
                <h3>Centro Commerciale</h3>
            </div>
            </div>
        </div>

            <div id="menu">
             <p><a href="#content" class="accesaid">Skip navigation</a></p>
             <ul>
                <li><a class="active"><span xml:lang="en">Home</span></a></li>
                <li><a href="negozi.php">Negozi</a></li>
                <li><a href="dovesiamo.html">Dove siamo</a></li>
                <li><a href="contatti.html">Contatti</a></li>
                <li><a href="promozioni_public.php">Promozioni</a></li>
             </ul> 
        </div>
        <div id="breadcrumb">
		<h2><span xml:lang="en">Home</span></h2>
	</div>
	<div id="content">
		<img id="torre" alt="immagine torre archimede" src="../images/torre 2.jpg"/>

		<p  id="intestazione">Benvenuti nel Centro Commerciale Archimede</p>
		<div id="tabellaLaterale">
			<table id="tabellaOrari" summary="In questa tabella vengono elencati gli orari del centro commerciale Archimede di tutti i giorni della settimana">
				<caption>Orari</caption>
				<tr>
					<td>Luned&igrave;: 9:00 - 21:00</td>
				</tr>
				<tr>
					<td>Marted&igrave;: 9:00 - 21:00</td>
				</tr>
				<tr>
					<td>Mercol&igrave;: 9:00 - 21:00</td>
				</tr>
				<tr>
					<td>Gioved&igrave;: 9:00 - 21:00</td>
				</tr>
				<tr>
					<td>Venerd&igrave;: 9:00 - 21:00</td>
				</tr>
				<tr>
					<td>Sabato: 9:00 - 21:00</td>
				</tr>
				<tr>
					<td>Domenica: 9:00 - 21:00</td>
				</tr>
			</table>


        <?php
        include("../privato/connessione_db.php");
        $query="SELECT E.descrizione FROM eventi E ORDER BY E.ID DESC LIMIT 5 ";
        	$ris=mysqli_query($connessione,$query) or die(mysqli_error($connessione));
        	echo('<table id="tabellaEventi" summary="In questa tabella vengono elencati i vari eventi che ci sono in un dato periodo  nel centro commerciale Archimede">
        		<caption>Eventi</caption>');
        	while($risultato=mysqli_fetch_array($ris)){
        		$evento=$risultato['descrizione'];
        		echo '
        		<tr>
					<td>'.$evento.'</td>
				</tr>';
        	}
        	echo '</div><!--fine Eventi-->';
        
        ?>
        <div id="sottoPiano">
		   <p class="casella"><a href="negozi.html">Negozi</a></p>
		   <p class="casella"><a href="negozi.html">Dove Siamo</a></p>
		   <p class="casella"><a href="negozi.html">Contatti</a></p>

		    <h2>Promozioni</h2>
		    <?php
		    $query="SELECT P.promozione,P.alt,I.negozio FROM promozioni P INNER JOIN info I ON P.username = I.username LIMIT 6 ORDER BY P.ID DESC";
		    $ris=mysqli_query($connessione,$query);
		    echo(' <div id="elencoPromozioni">');
		    while($risultato=mysqli_fetch_array($ris)) {
		    	$promozione=$risultato['promozione'];
		    	$alt=$risultato['alt'];
		    	$negozio=$risultato['negozio'];
		    	echo '<div class="promozioneHome">
                    <img class="promozione" src="'.$promozione.'" alt="'.$alt.'"/> 
                    <p>'.$negozio.'</p>
                </div>';
            }
            echo '</div><!--fine EVENTI-->';
            mysqli_close($connessione);
		    ?>
		
	</div>

        <div id="footer">
        <div id="footerMenu">
            <div id="contentMenuFooter">
        <ul>
           <li><a href="#header"><span xml:lang="en">Home</span></a></li>
           <li><a href="negozi.php">Negozi</a></li>
           <li><a href="dovesiamo.html">Dove siamo</a></li>
           <li><a href="contatti.html">Contatti</a></li>
           <li><a href="">Promozioni</a></li>
        </ul>
        </div>

        <h3>Centro Commerciale Archimede</h3>
        <img id="logoFooter" alt="logofooter" src="images/logo.jpg"/>

        <div id="infoFooter">
         <p>Via Trieste, 63  | 35121 Padova (Italy)| Telefono: +39 049 827 1200 | E-Mail:info@centro.archimede.it</p>
          </div> <!-- fine contatti_footer-->
        </div>
</div> <!-- fine footer-->
</body>
</html>
