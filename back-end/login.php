<?php 
include('classi.php'); 
?>
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

	<div id="breadcrumb">
        <h2><strong>LOGIN</strong></h2>        
    </div>
    <?php
        $controller = new controller();
        $controller->check_session();
        $controller->print_bar();
    ?>        
    <div id="content">
        <div id="content">
            <form action="verifica.php" method="post">
                <div id="formLogin">
                    <label for="NomeUtente">Nome Utente:</label>
                    <input name="username" type="text">
                    <label for="Password">Password:</label>
                    <input name="password"type="password">
                    <input type="submit" value="Accedi">
                </div>
            </form>
        </div>
    </div>
    <div id="footer">
    </div>
</body>
</html>