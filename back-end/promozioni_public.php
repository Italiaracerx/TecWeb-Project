<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />

	<title>Centro Archimede</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="handheld, screen"/>
	<!--<link rel="stylesheet" type="text/css" href="mobile.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)"/>per dispositivi mobili

	<link rel="stylesheet" type="text/css" href="print" media="print"/>STAMPA
    -->
</head>
 
<body>
	
	<div id="header">	    
		<div id="contenutoHeader">
			<img id="logo" alt="logo" src="images/logo.jpg"/>						
		    <div id="titolo">
				<h1>Archimede</h1>
		        <h3>Centro Commerciale</h3>
			</div>
			<form id="form" action="" method="post">
               <input type="text" name="cerca"/>
               <input type="submit" value="cerca"/>
            </form>
        </div>
    </div>


    <div id="menu">
        <p><a href="#content" class="accesaid">Skip navigation</a></p>
            <ul>
                <li><a href="home.html"><span xml:lang="en">Home</span></a></li>
                <li><a href="negozi.html">Negozi</a></li>
                <li><a href="dovesiamo.html">Dove siamo</a></li>
                <li><a href="contatti.html">Contatti</a></li>
				<li><a class="active">Promozioni</a></li>
            </ul> 
    </div>
    
    <div id="breadcrumb">
		<h2>Promozioni</h2>
	</div>
    
    <div id="content">
        <h2> Promozioni in corso</h2>
        <p class="intestazione">PROMOZIONI CORRENTI</p>
        <div id="PromozioniAttive">
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo1.jpg" alt="promozione"/> 
                    <p>Nome_Negozio_1</p>
                </div>
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo2.jpg" alt="promozione"/> 
                    <p>Nome_Negozio_2</p>
                </div>
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo3.png" alt="promozione"/> 
                    <p>Nome_Negozio_3</p>
                </div>
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo1.jpg" alt="promozione"/> 
                    <p>Nome_Negozio_4</p>
                </div>
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo1.jpg" alt="promozione"/> 
                    <p>Nome_Negozio_4</p>
                </div>
                
        </div>    
    </div>
    
    
    <div id="footer">
        <div id="footerMenu">
            <div id="contentMenuFooter">
                <ul>
                <li><a href="#header"> <span xml:lang="en">Home</span></a></li>
                <li><a href="negozi.html">Negozi</a></li>
                <li><a href="dovesiamo.html">Dove siamo</a></li>
                <li><a href="contatti.html">Contatti</a></li>
				<li><a href="promozioni_public.html">Promozioni</a></li>
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