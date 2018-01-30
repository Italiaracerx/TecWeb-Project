<?php
include("check_session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />

	<title>Centro Archimede</title>
	<link rel="stylesheet" type="text/css" href="admin.css" media="handheld, screen"/>
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
            <li><a class="active" href="">Generale</a></li>
            <li><a href="ListaUtenti_admin.html">Lista Utenti</a></li>
            <li><a href="ListaNegozio_admin.html">Lista Negozi</a></li>
            <li><a href="">Logout</a></li>
        </ul> 
    </div>

	<div id="breadcrumb">
        <h2><strong>ADMINISTRATOR</strong> > GENERALE</h2>        
    </div>
    <div id="content">
        <h3 id="titolo_negozio">GENERALE</h3>
        <p id="benvenuto">Benvenuto <strong>AMMINISTRATORE</strong></p>
        <div class="BarraOperazione">
        <div class="BoxSuperiore">
            <p class="intestazione">CREAZIONE NEGOZIO</p>
            <form id="NuovoNegozio"action="" method="post">
                <label for="nome">Nome Negozio:</label>
                <input type="text"/>
                <label for="nome">Nome Utente:</label>
                <input type="text"/>    
                <label for="nome">Password:</label>
                <input type="password"/>
                <label for="nome">Conferma Password:</label>
                <input type="password"/>                      
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
        </div>
        <div class="BoxSuperiore">
                <p class="intestazione">NUOVO EVENTO</p>
                <form action="" method="post">
                    <label for="nome">Descrizione:</label>
                    <textarea></textarea>
                    <input type="reset" value="Reset"/>  
                    <input type="submit" value="Salva"/>
                </form>
        </div>
        <div class="BoxSuperiore">
            <p class="intestazione">SBLOCCA NEGOZIO</p>
            <form action="" method="post">
                <label for="nome">Nome Negozio:</label>
                <input type="text"/>              
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
        </div>
        </div>
        <div class="BarraOperazione">
        <div class="BoxSuperiore">
            <p class="intestazione">MODIFICA PASSWORD</p>
            <form id="NuovoNegozio"action="" method="post">
                <label for="nome">Password:</label>
                <input type="password"/>
                <label for="nome">Conferma Password:</label>
                <input type="password"/>                      
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
        </div>
        <div class="BoxSuperiore">
            <p class="intestazione">BLOCCA NEGOZIO</p>
            <form action="" method="post">
                <label for="nome">Nome Negozio:</label>
                <input type="text"/>              
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
        </div>
        <div class="BoxSuperiore">
            <p class="intestazione">SBLOCCA NEGOZIO</p>
            <form action="" method="post">
                <label for="nome">Nome Negozio:</label>
                <input type="text"/>              
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
        </div>
        </div>
    </div>
    <div id="footer">
    </div>
</body>
</html> 
