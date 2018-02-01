<?php
include("../privato/home_dat.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />

	<title>Centro Archimede</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="handheld, screen"/>
	<link rel="stylesheet" type="text/css" href="mobile.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)"/><!--per dispositivi mobili-->

	<link rel="stylesheet" type="text/css" href="print" media="print"/><!--STAMPA-->

</head>
 
<body>
	
	<div id="header">
		<img id="logo" src="../images/cs.jpg" alt="Logo Centro Archimede"/>
		<h1 id="titolo">Centro Archimede</h1>
	</div>


	<div id="breadcrumb">
		<p>Ti trovi in: Home</p>
	</div>

    <div id="menu">
        <ul>
            <li><a><span xml:lang="en">Home</span></a></li>
            <li><a href="negozi.html">Negozi</a></li>
            <li><a href="dovesiamo.html">Dove siamo</a></li>
            <li><a href="contatti.html">Contatti</a></li>
            <li><a href="login.php">Login</a></li>            
        </ul>
    </div>
		<div id="contenuto">
			<h2>Benvenuti nel sito del Centro Archimede</h2>
			<img src="../images/image.jpg" alt="Foto del Centro Commerciale">
			<h3>Chi siamo</h3>
			<p>Situato a Padova, in zona Portello , Archimede &egrave; un  Centro Commerciale composto da tre negozi: Lego - Armani- Trony.Offre un ampio parcheggio,uno sportello Bancomat, vendita di biglietti per concerti ed eventi sportivi,un edicola e vari bar.</p>	
				<table id="orario" summary="In questa tabella c'&egrave; l'orario di apertura e chiusura del negozio di Lego.">
			<thead>
			<tr>
				<th scope="colgroup">ORARIO</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">Feriale:</th>
					<td><?php echo $riga['feriale'];?></td>
				</tr>

				<tr>
					<th scope="row">Sabato:</th>
					<td><?php echo $riga['sabato'];?></td>
				</tr>

				<tr>
					<th scope="row">Festivi:</th>
					<td><?php echo $riga['festivi'];?></td>
				</tr>
			</tbody>
			</table></div>


    <div id="footer"> 
    	<img id="HTML" src="../images/valid-xhtml10.png" alt = "XHTML valido"/>
        <img id="CSS" src="../images/vcss-blue.gif" alt = "CSS valido"/> 
        <p>Il sito &egrave; stato creato per un Progetto nell&rsquo;ambito del corso di <a href="http://informatica.math.unipd.it/laurea/tecnologieweb.html">Tecnologie Web</a> e non rappresenta quindi il sito di un reale centro commerciale.</p>
                

    </div>

</body>
</html>
