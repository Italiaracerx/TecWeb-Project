<?php
include('check_session.php');
include('general_private_dat.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Specifico il charset -->
    <title>Centro Archimede</title>
	<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />
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
                        <input name="Telefono" type="text" 
                        value="
                        <?php
                            echo $info['telefono'];
                        ?>"
                        />
                        <label>Email:</label>
                        <input name="Email" 
                        value="
                        <?php
                            echo $info['mail'];
                        ?>" type="text"/>
                        <label>Sito web:</label>
                        <input name="Sito_web" value="<?php
                            echo $info['sito'];
                        ?>" type="text"/>
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
                        <input name="lunedi" class="orario" 
                        value="<?php
                            echo $orario['lunedi'];
                        ?>"
                        type="text"/>
                        <label> Martedì :</label>
                        <input name="martedi" class="orario" 
                        value="<?php
                            echo $orario['martedi'];
                        ?> 
                        type="text"/>
                        <label> Mercoledì :</label>
                        <input name="mercoledi" class="orario" 
                        value="<?php
                            echo $orario['mercoledi'];
                        ?>" type="text"/>
                        <label> Giovedì :</label>
                        <input name="giovedi" class="orario" 
                        value="<?php
                            echo $orario['giovedi'];
                        ?>" type="text"/>
                        <label> Venerdì :</label>
                        <input name="venerdi" class="orario"
                         value="<?php
                            echo $orario['venerdi'];
                        ?>" type="text"/>
                        <label> Sabato :</label>
                        <input name="sabato" class="orario" 
                        value="<?php
                            echo $orario['sabato'];
                        ?>" type="text"/>
                        <label> Domenica :</label>
                        <input name="domenica" class="orario"
                         value="<?php
                            echo $orario['domenica'];
                        ?>" type="text"/>

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
                                <textarea name="testo_motto" rows="2" cols="50">
                                    <?php
                                          echo $info['titolo'];
                                     ?>
                                </textarea>  
                            </div> 
                            <label>Descrizione:</label>
                            <div class="box">                        
                                <textarea name="testo_descrizione" rows="5" cols="50">
                                    <?php
                                        echo $info['descrizione'];
                                        ?> 
                                        </textarea>  
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
