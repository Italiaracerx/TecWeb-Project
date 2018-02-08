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
	<!--
    <link rel="stylesheet" type="text/css" href="private_tablet.css" media="handheld, screen and (max-width:768px), 
    only screen and (max-device-width:768px)"/> 
    <link rel="stylesheet" type="text/css" href="private_mobile.css" media="handheld, screen and (max-width:480px), 
    only screen and (max-device-width:480px)"/> -->

<script>

function validateForm(form) {
    
   if (form.Password.value != form.Password_1.value || form.Password.value=="" || form.Password.value==" ") {
    form.Password.focus()
    form.Password.select()
    var o="ERRORE !!!";
    document.getElementById("demo_passw").innerHTML = o ;

    return false
  }
  else{
      alert("INSERIMENTO RIUSCITO !");
  return true}
}


function validaEmail(email) {
  
    var regexp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regexp.test(email);
}

function checkEmail(){
  email = document.getElementById("email").value;
  var sito=document.getElementById("Sito").value;
  var cane=document.getElementById("telefono").value;
  
    if(isNaN(cane) || cane=="" || cane==" ")
     { var o="ERRORE N.TELEFONO !!!";
    document.getElementById("demo_oktel").innerHTML = o ;
    return false;}
    else{
    var o="N. TELEFONO OK !!!";
    document.getElementById("demo_oktel").innerHTML = o ;
    
  if (validaEmail(email) && email!="" && email!=" ") {
      if(sito!="" && sito!=" ")
    {
        alert("INSERIMENTO COMPLETATO");
        return true;}
    else{
        var a="EMAIL OK !!!";
    document.getElementById("demo_okmail").innerHTML = a ;
    
         var o="SITO WEB NON VALIDO !!!";
    document.getElementById("demo_sito").innerHTML = o ;
    return false;}
  } 
       
    else{
      var o="ERRORE EMAIL !!!";
    document.getElementById("demo_okmail").innerHTML = o ;

    if(sito=="" && sito==" ")
      {var a="SITO WEB VALIDO !!!";
    document.getElementById("demo_sito").innerHTML = a ;
    return false;
        }
return false;
  
}}
return true;
}

 
function checkorario(form){
    
    var Lunedi=form.orario.value;
    var Martedi =form.orario_1.value;
    var Mercoledi=form.orario_2.value;
    var Giovedi=form.orario_3.value;
    var Venerdi=form.orario_4.value;
    var Sabato=form.orario_5.value;
    var Domenica=form.orario_6.value;

    
    var controlla=Lunedi.slice(2, -2);
    var controlla_1=Martedi.slice(2, -2);
    var controlla_2=Mercoledi.slice(2, -2);
    var controlla_3=Giovedi.slice(2, -2);
    var controlla_4=Venerdi.slice(2, -2);
    var controlla_5=Sabato.slice(2, -2);
    var controlla_6=Domenica.slice(2, -2);
    
    if(controlla!="-" || controlla_1!="-" || controlla_2!="-" || controlla_3!="-" || controlla_4!="-" || controlla_5!="-" 
        || controlla_6!="-")
    {var o="Formato orario errato !!!";
    document.getElementById("demo_orario").innerHTML = o ;
    return false;}
    
    var uno=Lunedi.split("-");
    var due=Martedi.split("-");
    var tre=Mercoledi.split("-");
    var quattro=Giovedi.split("-");
    var cinque=Venerdi.split("-");
    var sei=Sabato.split("-");
    var sette=Domenica.split("-");

    var verifico=parseInt(uno[0])
    var verifico_0=parseInt(uno[1])

    var verifico_1=parseInt(due[0])
    var verifico_2=parseInt(due[1])

    var verifico_3=parseInt(tre[0])
    var verifico_4=parseInt(tre[1])

    var verifico_5=parseInt(quattro[0])
    var verifico_6=parseInt(quattro[1])

    var verifico_7=parseInt(cinque[0])
    var verifico_8=parseInt(cinque[1])

    var verifico_9=parseInt(sei[0])
    var verifico_10=parseInt(sei[1])

    var verifico_11=parseInt(sette[0])
    var verifico_12=parseInt(sette[1])

    if(verifico<8 || verifico>=21 || verifico_0<=8 || verifico_0>21 ||
        verifico_1<8 || verifico_1>=21 || verifico_2<=8 || verifico_2>21 ||
        verifico_3<8 || verifico_3>=21 || verifico_4<=8 || verifico_4>21 ||
        verifico_5<8 || verifico_5>=21 || verifico_6<=8 || verifico_6>21 ||
        verifico_7<8 || verifico_7>=21 || verifico_8<=8 || verifico_8>21 ||
        verifico_9<8 || verifico_9>=21 || verifico_10<=8 || verifico_10>21 ||
        verifico_11<8 || verifico_11>=21 || verifico_12<=8 || verifico_12>21 )
        { var o="Orario non valido !!!";
    document.getElementById("demo_orario").innerHTML = o ;
    return false;
        }
else{    
    return true;}
}


function descrizione(form){
    var uno=form.testo.value;
    var due=form.testo_1.value;

    if(uno!="" && uno!=" " && due!="" && due!=" ")
    {
        return true;
    }
    else{
        var o="Descrizione non valida !!!";
    document.getElementById("demo_descrizione").innerHTML = o ;
    return false;

    }
}

function negozio(form){
    var nome=form.Negozio.value;
    if(nome!="" && nome!=" ")
        {return true;}
    else{
        var o="Nome Negozio non valido !!!";
    document.getElementById("demo_nomenegozio").innerHTML = o ;
    return false;

    }
}

function onlyNumeric(evt){
   
   var charCode=(evt.which)?evt.which:event.keyCode;
   if(charCode!=45 && (charCode<48 || charCode>57))
      {return false;}
   return true;
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
                        <input type="text" id="telefono"
                        value="
                        <?php 
                            echo $info['telefono'];
                        ?>" />

                        <label>Email:</label>
                        <input id="email"  type="text"
                         value="
                        <?php
                            echo $info['mail'];
                        ?>" />

                        <label>Sito web:</label>
                        <input id="Sito" type="text" 
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
                        <input name="Password_1" type="password"/>
                        
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
                            <input name="Negozio" type="text" value="<?php
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
                    <p id="esempio">Scrivere l'orario nel formato hh-hh, ad es. 04-12 o 12-20<br/>
                    ATTENZIONE l'orario non può sforare l'ora di apertura e chiusura del centro.<br/>
                Non è possibile inserire caratteri alfabetici tranne "-" (trattino).</p>
                    <div id="demo_orario"></div>
                    <form action="input_orario.php" method="post" onsubmit="return checkorario(this)" >

                        <label> Lunedì :</label>
                        <input name="orario" class="orario" type="text" maxlength="5" onkeypress="return onlyNumeric(event);"
                        value="<?php
                            echo $orario['lunedi'];
                        ?>"
                        />

                        <label> Martedì :</label>
                        <input name="orario_1" class="orario" type="text" maxlength="5" onkeypress="return onlyNumeric(event);"
                        value="<?php
                            echo $orario['martedi'];
                        ?>"
                        />

                        <label> Mercoledì :</label>
                        <input name="orario_2" class="orario" type="text" maxlength="5" onkeypress="return onlyNumeric(event);"
                        value="<?php
                            echo $orario['mercoledi'];
                        ?>"/>

                        <label> Giovedì :</label>
                        <input name="orario_3" class="orario" type="text" maxlength="5" onkeypress="return onlyNumeric(event);" 
                        value="<?php
                            echo $orario['giovedi'];
                        ?>" />

                        <label> Venerdì :</label>
                        <input name="orario_4" class="orario" type="text" maxlength="5" onkeypress="return onlyNumeric(event);"
                         value="<?php
                            echo $orario['venerdi'];
                        ?>" />

                        <label> Sabato :</label>
                        <input name="orario_5" class="orario" type="text" maxlength="5" onkeypress="return onlyNumeric(event);"
                        value="<?php
                            echo $orario['sabato'];
                        ?>" />

                        <label> Domenica :</label>
                        <input name="orario_6" class="orario" type="text" maxlength="5" onkeypress="return onlyNumeric(event);"
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
                                <textarea rows="2" name="testo" cols="50">
                                    <?php
                                          echo $info['titolo'];
                                     ?>
                                </textarea>  
                            </div> 
                            <label>Descrizione:</label>
                            <div class="box">                        
                                <textarea rows="5" name="testo_1" cols="50">
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
