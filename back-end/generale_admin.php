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
            <form class="NuovoNegozio" action="NuovoNegozio.php" method="post">
                <label for="nome">Nome Negozio:</label>
                <input name="username" type="text"/>
                <label for="nome">Password:</label>
                <input name="password"type="password"/>
                <label for="nome">Conferma Password:</label>
                <input type="password"/>                      
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
        </div>
        <div class="BoxSuperiore">
            <p class="intestazione">ELIMINA NEGOZIO</p>
            <form  class="NuovoNegozio"  action="EliminaNegozio.php" method="post">
                <label for="nome">Nome Negozio:</label>
                <input name="negozio" type="text"/>     
                <label for="nome">Conferma Nome Negozio:</label>
                <input type="text"/>             
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
        </div>
        </div>
        <div class="BarraOperazione">
        <div class="BoxSuperiore">
            <p class="intestazione">MODIFICA PASSWORD</p>
            <form class="NuovoNegozio" action="input_password.php" method="post">
                <label for="nome">Password:</label>
                <input name="password" type="password"/>
                <label for="nome">Conferma Password:</label>
                <input type="password"/>                      
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
        </div>
        <div class="BoxSuperiore">
            <p class="intestazione">NUOVO EVENTO</p>
            <form class="NuovoNegozio" action="eventi.php" method="post">
                <label name="descrizione" for="nome">Descrizione:</label>
                <textarea></textarea>
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
    </div>

        </div>
        <div class="ListaUtenti">
            <p class="intestazione">LISTA UTENTI</p>
            <table>
                <tr><th>Negozio</th><th>Nome Utente</th></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>
                <tr><td>lego</td><td>lego</td></tr>

            </table>
        </div>
    </div>
    <div id="footer">
    </div>
</body>
</html> 
