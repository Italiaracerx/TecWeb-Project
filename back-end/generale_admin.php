<?php include('check_session.php');?>
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
            <li><a href="logout.php">Logout</a></li>
        </ul> 
    </div>

	<div id="breadcrumb">
        <h2><strong>ADMINISTRATOR</strong> > GENERALE</h2>        
    </div>
    <?php
    if($_SESSION['flag'] == 1){
        echo '<h2 id="correct">'.$_SESSION['flag_text'].'</h2>';
        include('reset_flag.php');
    }
    if($_SESSION['flag'] == 2){
        echo '<h2 id="error">'.$_SESSION['flag_text'].'</h2>';
        include('reset_flag.php');
    }
    ?>
    <div id="content">
        <h3 id="titolo_negozio">GENERALE</h3>
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
                <tr><th>User</th><th>Type User</th></tr>
                <?php
                include("connessione_db.php");
                
                    $query= " SELECT username, type FROM account";
                    $ris=mysqli_query($connessione,$query);

                    while($risultato=mysqli_fetch_array($ris)) {
                        $username=$risultato['username'];
			            $type=$risultato['type'];
                        echo '<tr><td>'.$username.'</td><td>'.$type.'</td></tr>
                        ';
                    }
                
                ?>
            </table>
        </div>
    </div>
    <div id="footer">
    </div>
</body>
</html> 

<<?php 
	mysqli_close($connessione);
?>