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

        <?php
        include("connessione_db.php");
        if (!$_GET){
            $query = " SELECT L.username, L.logo, L.descrizione, I.negozio FROM logo L INNER JOIN info I ON L.username = I.username";
            $ris =mysqli_query($connessione,$query);

            echo('  <div id="breadcrumb">
                        <h2>Negozi</h2>
                    </div>
                    <div id="content"><!--NEGOZI-->');
            while ($risultato=mysqli_fetch_array($ris) or die (mysqli_error($connessione))) {
                $username=$risultato['username'];
                $logo=$risultato['logo'];
                $alt=$risultato['descrizione'];
                $negozio=$risultato['negozio'];
                echo '<div class="vetrina">   
                 <a href="negozio.php?negozio='.$username.'">
                 <img src="'.$logo.'" alt="'.$alt.'"/></a>
                 <h5 class="NomeItem">'.$negozio.'</h5>
                 </div>';
            } 
            echo '</div><!--fine NEGOZI-->';
        }
        else{
            $negozio = $_GET['negozio'];
            $query1= " SELECT * FROM orario WHERE username = '$negozio'";
            $query2= " SELECT * FROM logo WHERE username = '$negozio'";
            $query3= " SELECT * FROM info WHERE username = '$negozio'";
            $query4= " SELECT * FROM prodotti WHERE username = '$negozio'";
            $query5= " SELECT * FROM promozioni WHERE username = '$negozio'";
        
            $ris1 = mysqli_query($connessione,$query1);
            $ris2 = mysqli_query($connessione,$query2);
            $ris3 = mysqli_query($connessione,$query3);
            $ris4 = mysqli_query($connessione,$query4);
            $ris5 = mysqli_query($connessione,$query5);

            $orario=mysqli_fetch_array($ris1) or die (mysqli_error($connessione));
            $logo=mysqli_fetch_array($ris2) or die (mysqli_error($connessione));
            $info=mysqli_fetch_array($ris3) or die (mysqli_error($connessione));

            echo '<div id="breadcrumb">
            <h2><strong>NEGOZIO</strong> > '.$info['negozio'].'</h2>        
        </div>';
        
        echo '<div id="content">
            <div id="content_negozio">
                <h3 id="titolo_negozio">'.$info["negozio"].'</h3>';
    
            echo '<div id="informazioni">
                        <img id="logo_negozio" src="'.$logo['logo'].'" alt="'.$logo['descrizione'].'"/>
    
                    <div id="contatti">
                        <h4 class="informazione">TELEFONO / FAX</h4>
                        <p class="dato">'.$info["telefono"].'></p>
                        <h4 class="informazione">EMAIL</h4>
                        <p class="dato">'.$info['mail'].'</p>
                        <h4 class="informazione">SITO WEB</h4>
                        <a class="dato" href="'.$info['sito'].'"></a>
                        <div id="orari">
                            <h4 class="informazione">ORARI</h4>
                            <p class="dato"><strong>Luned&igrave; :</strong>'.$orario['lunedi'].'</p>
                            <p class="dato"><strong>Marted&iacute; :</strong>'.$orario['martedi'].'</p>
                            <p class="dato"><strong>Mercoled&iacute; :</strong>'.$orario['mercoledi'].'</p>
                            <p class="dato"><strong>Gioved&iacute; :</strong>'.$orario['giovedi'].'</p>
                            <p class="dato"><strong>Venerd&iacute; :</strong>'.$orario['venerdi'].'</p>
                            <p class="dato"><strong>Sabato :</strong>'.$orario['sabato'].'</p>
                            <p class="dato"><strong>Domenica :</strong>'.$orario['domenica'].'</p>
                                
                        </div>
    
                    </div>
                </div>';
    
            echo '<div id="descrizione">
                        <p id="testo">               
                            <strong>'.$info["titolo"].'</strong><br/>'.$info["descrizione"].'  
                        </p>
                        <div id="prodotti">
                            <h4 class="titolo_prodotti">PRODOTTI</h4>';
                            if(!$ris4){
                                echo '<p class="comingsoon">Coming Soon</p>';
                            }
                            else{
                                while ($prodotto=mysqli_fetch_array($ris4)){
                                    echo '<div class="prodotto">
                                    <img class="gioco" src="'.$prodotto['prodotto'].'" alt="'.$prodotto['alt'].'"/>
                                    <h5 class="NomeItem">'.$prodotto['descrizione'].'</h5>
                                </div> ';
                                }                                
                            }
                        echo '</div>
                        <div id="promozioni">
                                <h4 class="titolo_prodotti">PROMOZIONI</h4>';
                            $f=mysqli_fetch_array($ris5);
                            if(!$f){
                                echo '<p class="comingsoon">Coming Soon</p>';
                            }
                            else{
                                while ($promozione=mysqli_fetch_array($ris5)) {
                                    echo '<img class="promo" src="'.$promozione['promozione'].'" alt="'.$promozione['alt'].'"/>';
                                }
                            }
                        echo '</div>
                </div>
            </div>
        </div>';            
        }
    
         ?>

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
