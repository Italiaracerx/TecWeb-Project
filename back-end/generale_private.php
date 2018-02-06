<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />

	<title>Centro Archimede</title>
	<link rel="stylesheet" type="text/css" href="private_style.css" media="handheld, screen"/>
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
            <li><a class="active" href="">Generale</a></li>
            <li><a href="promozioni_private.php">Promozioni</a></li>
            <li><a href="prodotti_private.php">Prodotti</a></li>
            <li><a href="negozio.php">Pagina Negozio</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul> 
    </div>

	<div id="breadcrumb">
        <h2><strong>LEGO</strong> > GENERALE</h2>        
    </div>
    <div id="content">
        <div id="content_generale">
            <h3 id="titolo_negozio">GENERALE</h3>
            <p id="benvenuto">Benvenuto <strong>Ciccio78</strong></p>

            <div id="sopra">
                <div class="boxSopra">
                    <p class="intestazione">MODIFICA CONTATTI</p>
                    <form class="form" action="input_contatti.php" method="post">
                        <label>Telefono / Fax:</label>
                        <input name="Telefono" type="text" value="041610265"/>
                        <label>Email:</label>
                        <input name="Email" value="blablabla@lego.com" type="text"/>
                        <label>Sito web:</label>
                        <input name="Sito_web" value="www.lego.com/it-it" type="text"/>
                        <div class="invia">               
                            <input type="reset" value="Reset"/>  
                            <input type="submit" value="Salva"/>
                        </div>                                                        
                    </form>
                </div>
                <div class="boxSopra">
                    <p class="intestazione">MODIFICA PASSWORD</p>
                    <form class="form" action="input_password.php" method="post">
                        <label>Password:</label>
                        <input type="password" class="campo"/>
                        <label>Conferma Password:</label>
                        <input name="password" type="text"/>
                        <div class="invia">               
                            <input type="reset" value="Reset"/>  
                            <input type="submit" value="Salva"/>
                        </div>                                
                    </form>
                </div>
            </div>            
                <div id="secondo">               
                <div class="boxSotto">
                    <p class="intestazione">MODIFICA LOGO</p>
                    <form action="" method="post">
                        Select a file: <input id="file" type="file" name="img"/>
                        <input type="reset" value="Reset"/>
                        <input type="submit" value="Salva"/>
                        </form>
                </div>
                <div class="boxSotto">
                        <p class="intestazione">MODIFICA NOME NEGOZIO</p>
                        <form action="input_nomeNegozio.php" method="post">
                            Nome:
                            <input name="campo" value="LEGO STORE" type="text"/>
                            <input type="reset" value="Reset"/>
                            <input type="submit" value="Salva"/>
                        </form>
                    </div>
                </div>
            <div id="sotto">
                <div id="sinistra">
                    <p class="intestazione">MODIFICA ORARIO</p>
                    <form action="input_orario.php" method="post">
                        <label> Lunedì :</label>
                        <input name="lunedi" class="orario" value="10-23" type="text"/>
                        <label> Martedì :</label>
                        <input name="martedi" class="orario" value="10-23" type="text"/>
                        <label> Mercoledì :</label>
                        <input name="mercoledi" class="orario" value="10-23" type="text"/>
                        <label> Giovedì :</label>
                        <input name="giovedi" class="orario" value="10-23" type="text"/>
                        <label> Venerdì :</label>
                        <input name="venerdi" class="orario" value="10-23" type="text"/>
                        <label> Sabato :</label>
                        <input name="sabato" class="orario" value="10-23" type="text"/>
                        <label> Domenica :</label>
                        <input name="domenica" class="orario" value="10-23" type="text"/>
                        <input class="pulsante" type="submit" value="Salva"/>                                
                        <input class="pulsante" type="reset" value="Reset"/>  
                    </form>
                </div>
                <div id="destra">
                    <div id="descrizione">
                        <p class="intestazione">MODIFICA DESCRIZIONE</p>
                        <form action="input_descrizioni.php" method="post">
                            <label>Motto:</label>                    
                            <div class="box">                        
                                <textarea name="testo_motto" rows="2" cols="50">Our mission: To inspire and develop the builders of tomorrow</textarea>  
                            </div> 
                            <label>Descrizione:</label>
                            <div class="box">                        
                                <textarea name="testo_descrizione" rows="5" cols="50">Il nostro scopo è ispirare ed educare i bambini a pensare creativamente, ragionare in modo sistematico e realizzare il loro potenziale, plasmando il loro futuro e sperimentando le infinite possibilità umane. </textarea>  
                            </div>
                            <input class="pulsante" type="submit" value="Salva"/>                                
                            <input class="pulsante" type="reset" value="Reset"/>                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
    </div>
</body>
</html> 
