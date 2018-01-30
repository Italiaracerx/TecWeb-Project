<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />

	<title>Centro Archimede</title>
	<link rel="stylesheet" type="text/css" href="private_style.css" media="handheld, screen"/>
	<!--<link rel="stylesheet" type="text/css" href="mobile.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)"/>per dispositivi mobili

	<link rel="stylesheet" type="text/css" href="print" media="print"/>STAMPA
    -->
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
            <li><a  href="generale_private.html">Generale</a></li>
            <li><a class="active" href="">Promozioni</a></li>
            <li><a href="prodotti_private.html">Prodotti</a></li>
            <li><a href="lego.html">Pagina Negozio</a></li>
            <li><a href="">Logout</a></li>
        </ul> 
    </div>

	<div id="breadcrumb">
        <h2><strong>LEGO</strong> > PROMOZIONI</h2>
    </div>
    <div id="content">
        <div id="ContentPromozioni">
            <div id="ColonnaSinistra">
                <div class="NuovaPromozione">
                    <p class="intestazione">NUOVA PROMOZIONE</p>
                    <form action="" method="post">
                        <p class="SottoTitolo">Descrizione promozione:</p>
                        <textarea cols="30" rows="10"></textarea>
                        <p class="SottoTitolo">Seleziona la promozione da inserire:</p>
                        <input type="file" name="img"/>
                        <input class="invia" type="submit" value="Salva"/>                                                        
                    </form>
                </div>
            </div>
            <div id="PromozioniCorrenti">
                <p class="intestazione">PROMOZIONI CORRENTI</p>
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo1.jpg" alt="promozione"/> 
                </div>
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo2.jpg" alt="promozione"/> 
                </div>
                <div class="imgPromozione">
                    <img class="promozione" src="images/promo3.png" alt="promozione"/> 
                </div>
            </div>            
        </div>
    </div>
    <div id="footer">
    </div>
</body>
</html> 
