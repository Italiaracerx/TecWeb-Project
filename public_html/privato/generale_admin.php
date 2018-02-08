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

    <script>


function validateForm(form) {
    if(form.Nome_negozio.value!="" && form.Nome_negozio.value!=" ")
    {
        if(form.Nome_utente.value!="" && form.Nome_utente.value!=" " && form.Nome_utente.value!="admin")
        {
   if (form.Password.value != form.Password_1.value || form.Password.value=="" || form.Password.value==" ") {
    form.Password.focus()
    form.Password.select()
    var o="Password non corretta !!!";
    document.getElementById("demo").innerHTML = o ;

    return false
  }
  alert("CORRETTO");
  return true
}else{
    var o="Nome utente non corretto!!!";
    document.getElementById("demo").innerHTML = o ;
return false;
}

}else{
    var o="Nome negozio non corretto!!!";
    document.getElementById("demo").innerHTML = o ;
return false;
}
}

function validateForm_1(form) {
    
   if (form.Password.value != form.Password_1.value || form.Password.value=="" || form.Password.value==" ") {
    form.Password.focus()
    form.Password.select()
    var o="Password non corretta !!!";
 document.getElementById("demos").innerHTML = o ;

    return false
  }
  alert("CORRETTO");
  return true
}


function validateUser(form) {
   if (form.Username.value != form.Username_1.value || form.Username.value=="" || form.Username.value==" ") {
    form.Username.focus()
    form.Username.select()
    var o="Nome negozio non corretto !!!";
    document.getElementById("demou_e").innerHTML = o ;
    return false
  }
  else{
alert("CORRETTO");
   return true}
}

function descrizione(form){
    var uno=form.testo.value;

    if(uno!="" && uno!=" ")
    {
        return true;
    }
    else{
        var o="Descrizione non valida !!!";
    document.getElementById("demo_descrizione").innerHTML = o ;
    return false;

    }
}

</script>

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
    <div id="content">
        <h3 id="titolo_negozio">GENERALE</h3>
        <p id="benvenuto">Benvenuto <strong>AMMINISTRATORE</strong></p>
        <div class="BarraOperazione">
        <div class="BoxSuperiore">

             <p class="intestazione">CREAZIONE NEGOZIO</p>
            <div id="demo"></div>
            <form class="NuovoNegozio" action="NuovoNegozio.php" method="post" onsubmit="return validateForm(this)">
    
                <label for="nome">Nome Negozio:</label>
                <input name="Nome_negozio" type="text"/>
                
                <label for="nome">Nome Utente:</label>
                <input name="Nome_utente" type="text"/>    
                
                <label for="nome">Password:</label>
                <input name="Password" type="password"/>
                
                <label for="nome">Conferma Password:</label>
                <input name="Password_1" type="password"/> 
                                     
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
        </div>

        <div class="BoxSuperiore">
            <p class="intestazione">ELIMINA NEGOZIO</p>
            <div id="demou_e"></div><div id="demou_c"></div>
            <form  class="NuovoNegozio" action="EliminaNegozio.php" method="post"  onsubmit="return validateUser(this)">
            
                <label for="nome">Nome Negozio:</label>
                <input name="Username" type="text"/>   
                  
                <label for="nome">Conferma Nome Negozio:</label>
                <input name="Username_1" type="text"/>           
                  
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
                
            </form>
        </div>
        </div>
        <div class="BarraOperazione">
        <div class="BoxSuperiore">
           <p class="intestazione">MODIFICA PASSWORD</p>
            <div id="demos"></div>
            <form class="NuovoNegozio" action="input_password.php" method="post" onsubmit="return validateForm_1(this)">
            
                <label for="nome">Password:</label>
                <input name="Password" type="password"/>
                
                <label for="nome">Conferma Password:</label>
                <input name="Password_1" type="password"/>                   
                   
                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva"/>
            </form>
        </div>        
        <div class="BoxSuperiore">
            <p class="intestazione">NUOVO EVENTO</p>
           <form class="NuovoNegozio" action="input_evento.php" method="post" onsubmit="return descrizione(this)">
                <div id="demo_descrizione"></div>
                <label for="nome">Descrizione:</label>
                <textarea name="testo"></textarea>

                <input type="reset" value="Reset"/>  
                <input type="submit" value="Salva" />
            </form>
    </div>

        </div>
        <div class="ListaUtenti">
            <p class="intestazione">LISTA UTENTI</p>
            <table>
                <tr><th>Nome Utente</th><th>password</th></tr>
                <?php
                include("connessione_db.php");
                
                    $query= " SELECT * FROM accountNegozi";
                    $ris=mysqli_query($connessione,$query);

                    while($risultato=mysqli_fetch_array($ris) or die(mysqli_error($connessione))) {
                        $username=$risultato['username'];
                        $password=$risultato['password'];
                        echo '<tr><td>'.$username.'</td><td>'.$password.'</td></tr>';
                    }
                
                ?>
            </table>
        </div>
    </div>
    <div id="footer">
    </div>
    <?php
       mysqli_close($connessione);
    ?>
</body>
</html> 
