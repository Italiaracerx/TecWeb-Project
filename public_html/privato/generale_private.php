<?php
include('check_session.php');
include('general_private_dat.php');
?>
 <script src="general_private_fun.js"></script> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Specifico il charset -->
    <title>Centro Archimede</title>
	<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />
	<link rel="stylesheet" type="text/css" href="private_style.css" media="handheld, screen"/>
	<!--
    <link rel="stylesheet" type="text/css" href="private_tablet.css" media="handheld, screen and (max-width:768px), 
    only screen and (max-device-width:768px)"/> 
    <link rel="stylesheet" type="text/css" href="private_mobile.css" media="handheld, screen and (max-width:480px), 
    only screen and (max-device-width:480px)"/> -->



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
        <h2><strong><?php
       echo $info["negozio"];
    ?>
    </strong> &gt; GENERALE</h2>        
    </div>
    <div id="content">
        <div id="content_generale">
            <h3 id="titolo_negozio">GENERALE</h3>
            <p id="benvenuto">Benvenuto <strong><?php
             echo $user;
             ?></strong></p>

            <div id="sopra">
                <div class="boxSopra">
                    <p class="intestazione">MODIFICA CONTATTI</p>
                    <div id="demo_sito"></div> <div id="demo_oktel"></div> <div id="demo_okmail"></div>

                    <form class="form" action="input_contatti.php" method="post" onsubmit="return checkEmail()" >
                        
                        <label>Telefono / Fax:</label>
                        <input type="text" id="telefono" name="Telefono"
                        value="
                        <?php 
                            echo $info['telefono'];
                        ?>" />

                        <label>Email:</label>
                        <input id="email"  type="text" name="Email"
                         value="
                        <?php
                            echo $info['mail'];
                        ?>" />

                        <label>Sito web:</label>
                        <input id="Sito" type="text" name="Sito_web"
                        value="<?php
                            echo $info['sito'];
                        ?>" />

                        <div class="invia">               
                            <input type="reset" value="Reset"/>  
                            <input type="submit" value="Salva"/>
                        </div>                                                        
                    </form>
                </div>
                <div class="boxSopra">
                    <p class="intestazione">MODIFICA PASSWORD</p>
                    <div id="demo_passw"></div>

                     <form class="form" action="input_password.php" method="post" onsubmit="return validateForm(this)">
                    
                        <label>Password:</label>
                        <input name="Password" type="password"/>
                        
                        <label>Conferma Password:</label>
                        <input name="password" type="password"/>
                        
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
                        <div id="demo_nomenegozio"></div>

                       <form action="input_nomeNegozio.php" method="post" onsubmit="return negozio(this)">
                            Nome:
                            <input name="campo" type="text" value="<?php
                            echo $info["negozio"];
                            ?>" />

                            <input type="reset" value="Reset"/>
                            <input type="submit" value="Salva"/>
                        </form>
                    </div>
                </div>
            <div id="sotto">
                <div id="sinistra">
                    <p class="intestazione">MODIFICA ORARIO</p>
                    <p id="esempio">Scrivere l'orario nel formato hh:mm-hh:mm, <br/>ad es. 08:30-12:30 <br/>
                    ATTENZIONE l'orario non può sforare l'ora di apertura e chiusura del centro.<br/>
                Non è possibile inserire caratteri alfabetici eccetto "-", ":".</p>
                    <div id="demo_orario"></div>
                    <form action="input_orario.php" method="post" onsubmit="return checkorario(this)" >

                        <label> Lunedì :</label>
                        <input name="lunedi" class="orario" type="text" maxlength="11" onkeypress="return onlyNumeric(event);"
                        value="<?php
                            echo $orario['lunedi'];
                        ?>"
                        />

                        <label> Martedì :</label>
                        <input name="martedi" class="orario" type="text" maxlength="11" onkeypress="return onlyNumeric(event);"
                        value="<?php
                            echo $orario['martedi'];
                        ?>"
                        />

                        <label> Mercoledì :</label>
                        <input name="mercoledi" class="orario" type="text" maxlength="11" onkeypress="return onlyNumeric(event);"
                        value="<?php
                            echo $orario['mercoledi'];
                        ?>"/>

                        <label> Giovedì :</label>
                        <input name="giovedi" class="orario" type="text" maxlength="11" onkeypress="return onlyNumeric(event);" 
                        value="<?php
                            echo $orario['giovedi'];
                        ?>" />

                        <label> Venerdì :</label>
                        <input name="venerdi" class="orario" type="text" maxlength="11" onkeypress="return onlyNumeric(event);"
                         value="<?php
                            echo $orario['venerdi'];
                        ?>" />

                        <label> Sabato :</label>
                        <input name="sabato" class="orario" type="text" maxlength="11" onkeypress="return onlyNumeric(event);"
                        value="<?php
                            echo $orario['sabato'];
                        ?>" />

                        <label> Domenica :</label>
                        <input name="domenica" class="orario" type="text" maxlength="11" onkeypress="return onlyNumeric(event);"
                         value="<?php
                            echo $orario['domenica'];
                        ?>" />

                        <input class="pulsante" type="submit" value="Salva"/>                                
                        <input class="pulsante" type="reset" value="Reset"/>  
                    </form>
                </div>
                <div id="destra">
                    <div id="descrizione">
                        <p class="intestazione">MODIFICA DESCRIZIONE</p>
                        <div id="demo_descrizione"></div>
                        <form action="input_descrizioni.php" method="post" onsubmit="return descrizione(this)">

                            <label>Motto:</label>                    
                            <div class="box">                        
                                <textarea rows="2" name="testo_motto" cols="50">
                                    <?php
                                          echo $info['titolo'];
                                     ?>
                                </textarea>  
                            </div> 
                            <label>Descrizione:</label>
                            <div class="box">                        
                                <textarea rows="5" name="testo_descrizione" cols="50">
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
    <?php 
    mysqli_close($connessione);
    ?>
    <div id="footer">
    </div>
</body>
</html> 
