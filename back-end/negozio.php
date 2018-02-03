<?php  include("ListaNegozi.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />

	<title>Centro Archimede</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="handheld, screen"/>
	<link rel="stylesheet" type="text/css" href="mobile.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)"/><!--per dispositivi mobili-->
    <link rel="stylesheet" type="text/css" href="tablet.css" media="handheld, screen and (max-width:710px) and (min-width:481px),
	only screen and (max-width:705px) and (min-width:481px)"/><!--TABLET-->

	<link rel="stylesheet" type="text/css" href="print.css" media="print"/><!--STAMPA-->

</head>
 
<body>
	   <div id="header">       
        <div id="contenutoHeader">
            <img id="logo" alt="logo" src="images/logo.jpg"/>                      
            <div id="titolo">
                <h1>Archimede</h1>
                <h3>Centro Commerciale</h3>
            </div>
            <form id="form" action="" method="post">
               <input type="text" name="cerca"/>
               <input type="submit" value="cerca"/>
              </form>
            </div>
        </div>

            <div id="menu">
             <p><a href="#content" class="accesaid">Skip navigation</a></p>
             <ul>
                <li><a href="home.html"><span xml:lang="en">Home</span></a></li>
                <li><a class="active" >Negozi</a></li>
                <li><a href="dovesiamo.html">Dove siamo</a></li>
                <li><a href="contatti.html">Contatti</a></li>
                <li><a href="promozioni_public.html">Promozioni</a></li>
             </ul> 
        </div>

        <?php if (!$_GET):?>
        echo('<div id="breadcrumb">
    <h2>Negozi</h2>
    </div>
    
    
    <div id="content"><!--NEGOZI-->";
    <?php
    foreach($riga as $riga){
        echo('<div class="vetrina">');     
        echo('<a href="negozio.php?negozio='.$riga["username"]);
        echo('<img src="images/'.$riga["logo"].'" alt="'.$riga["descrizione"].'"/></a>');
        echo('</div>');
    }?>
    </div><!--fine NEGOZI-->
    <?php else: ?>
	<div id="breadcrumb">
        <h2><strong>NEGOZIO</strong> > <?php echo $info["negozio"];?></h2>        
    </div>
    
	<div id="content">
        <div id="content_negozio">
            <h3 id="titolo_negozio"><?php echo $info["negozio"];?></h3>

            <div id="informazioni">
                    <img id="logo_negozio" src="images/<?php echo $logo["logo"];?>" alt="<?php echo $info["descrizione"];?>"/>

                <div id="contatti">
                    <h4 class="informazione">TELEFONO / FAX</h4>
                    <p class="dato"><?php echo $info["telefono"];?></p>
                    <h4 class="informazione">EMAIL</h4>
                    <p class="dato"><?php echo $info["mail"];?></p>
                    <h4 class="informazione">SITO WEB</h4>
                    <a class="dato" href="<?php echo $info["sito"];?>"><?php echo $info["negozio"];?></a>
                    <div id="orari">
                        <h4 class="informazione">ORARI</h4>
                        <p class="dato"><strong>Luned&igrave; :</strong><?php echo $orari["lunedi"];?></p>
                        <p class="dato"><strong>Marted&iacute; :</strong><?php echo $orari["martedi"];?></p>
                        <p class="dato"><strong>Mercoled&iacute; :</strong><?php echo $orari["mercoledi"];?></p>
                        <p class="dato"><strong>Gioved&iacute; :</strong><?php echo $orari["giovedi"];?></p>
                        <p class="dato"><strong>Venerd&iacute; :</strong><?php echo $orari["venerdi"];?></p>
                        <p class="dato"><strong>Sabato :</strong><?php echo $orari["sabato"];?></p>
                        <p class="dato"><strong>Domenica :</strong><?php echo $orari["domenica"];?></p>
                            
                    </div>

                </div>
            </div>

            <div id="descrizione">
                    <p id="testo">               
                        <strong><?php echo $info["titolo"];?></strong><br/>
                        <?php echo $info["descrizione"];?>  
                    </p>
                    <div id="prodotti">
                        <h4 class="titolo_prodotti">PRODOTTI</h4>
                        <?php 
                            for ($j=0; $j<3 && $j <count($prodotto); $j++) {
                                echo('<img class="gioco" src="images/'.$prodotto[$j]['prodotto'].'" alt="'.$prodotto[$j]['alt'].'"/>');
                            }
                        ?>
                    </div>
                    <div id="promozioni">
                            <h4 class="titolo_prodotti">PROMOZIONI</h4>
                            <?php 
                            for ($j=0; $j<3 && $j <count($promozione); $j++) {
                                echo('<img class="gioco" src="images/'.$promozione[$j]['prodotto'].'" alt="'.$prodotto[$j]['alt'].'"/>');
                            }
                        ?>
                    </div>
            </div>
        </div>
    </div>            
    <?php endif ?>



    <div id="footer">
        <div id="footerMenu">
            <div id="contentMenuFooter">
        <ul>
           <li><a href="#header"><span xml:lang="en">Home</span></a></li>
           <li><a href="negozi.html">Negozi</a></li>
           <li><a href="dovesiamo.html">Dove siamo</a></li>
           <li><a href="contatti.html">Contatti</a></li>
           <li><a href="">Promozioni</a></li>
        </ul>
        </div>

        <h3>Centro Commerciale Archimede</h3>
        <img id="logoFooter" alt="logofooter" src="images/logo.jpg"/>

        <div id="infoFooter">
         <p>Via Trieste, 63  | 35121 Padova (Italy)| Telefono: +39 049 827 1200 | E-Mail:info@centro.archimede.it</p>
          </div> <!-- fine contatti_footer-->
        </div>
</div> <!-- fine footer-->
</body>
</html>
