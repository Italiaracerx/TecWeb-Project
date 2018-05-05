<?php 
require_once __DIR__.'/../interfacce/type_page.php';


class negozi implements type_page{
	private static $style="style.css";
	private $menu;
	private $name;

	public function __construct(menu $menu){
        if(isset($_GET['shop'])){
            $this->name ='negozio :'.$_GET['shop'];            
        }
        $this->name ='negozio';
		$this->menu =$menu;
	}
	public function intestazione(){
		$file = file_get_contents('../../class/HTMLstored/public/preambolo.html', FILE_USE_INCLUDE_PATH);
		$file = str_replace('__USER__',$_SESSION['user'],$file);
		$file = str_replace('__NAME_PAGE__',$this->name,$file);
		$file = str_replace('__STYLE__',negozi::$style,$file);

		echo $file;
    }
    public function header(){
        $file = file_get_contents('../../class/HTMLstored/public/header.html', FILE_USE_INCLUDE_PATH);
        echo $file;
	}
	public function menu(){
        echo '<div id="menu">';
		$this->menu->print();
	}		
    public function breadcrumb(){
    	echo '	<div id="breadcrumb">
        			<h2><strong>'.$this->name.'</strong></h2>        
    			</div>';
    }
    public function footer(){
        echo '       
        <div id="footer">
            <div id="footerMenu">
                <div id="contentMenuFooter">';
                    $this->menu->print();
                echo '
            </div>
        </div>

            <h3>Centro Commerciale Archimede</h3>
            <img id="logoFooter" alt="logofooter" src="images/logo.jpg"/>
            <div id="infoFooter">
            <p>Via Trieste, 63  | 35121 Padova (<span xml:lang="en">Italy</span>)| Telefono: +39 049 827 1200 | <span xml:lang="en">e-mail</span>:info@centro.archimede.it</p>
			</div> <!-- fine contatti_footer--></div>
			</body>
			</html>';
    }
    public function body(){
		$this->header();
		$this->menu();
    	$this->breadcrumb();
    }
	public function head(){
		$this->intestazione();
		$this->body();
    }
    public function content(){
        echo '<div id="content">';

        if(isset($_GET['shop'])){
            echo '        <div id="content_negozio">
            <h3 id="titolo_negozio">LEGO STORE</h3>
            <div id="informazioni">
                <img id="logo_negozio" src="images/imglego.jpg" alt="logo"/>
                <div id="contatti">
                    <h4 class="informazione">TELEFONO / FAX</h4>
                    <p class="dato">041610265</p>
                    <h4 class="informazione"><span xml:lang="en">EMAIL</span></h4>
                    <p class="dato">blablabla@lego.com</p>
                    <h4 class="informazione">SITO WEB</h4>
                    <a class="dato" href="https://www.lego.com/it-it">www.lego.com/it-it</a>
                    <div id="orari">
                        <h4 class="informazione">ORARI</h4>
                        <p class="dato"><strong>Luned&igrave; :</strong> 9:00 - 21:00</p>
                        <p class="dato"><strong>Marted&iacute; :</strong>  9:00 - 21:00</p>
                        <p class="dato"><strong>Mercoled&iacute; :</strong>  9:00 - 21:00</p>
                        <p class="dato"><strong>Gioved&iacute; :</strong>  9:00 - 21:00</p>
                        <p class="dato"><strong>Venerd&iacute; :</strong>  9:00 - 21:00</p>
                        <p class="dato"><strong>Sabato :</strong>  9:00 - 21:00</p>
                        <p class="dato"><strong>Domenica :</strong>  9:00 - 21:00</p>
                            
                    </div>

                </div>
            </div>

            <div id="descrizione">
                    <p id="testo">               
                        <strong><span xml:lang="en">Our mission: To inspire and develop the builders of tomorrow</span></strong><br/>Il nostro scopo è ispirare ed educare i bambini a pensare creativamente, ragionare in modo sistematico e realizzare il loro potenziale, plasmando il loro futuro e sperimentando le infinite possibilità umane.  
                    </p>
                    <div id="prodotti">
                        <h4 class="titolo_prodotti">PRODOTTI</h4>
                        
                        <div class="prodotto">
                            <a href="prodotto1.html">
                            <img class="gioco" src="images/lego1.jpg" alt="prodotto in vendita"/>
                             </a>
                            <h5 class="NomeItem">gioco 1</h5>
                        </div>  

                        <div class="prodotto">
                            <a href="prodotto1.html">
                            <img class="gioco" src="images/lego2.jpg" alt="prodotto in vendita"/>
                             </a>
                            <h5 class="NomeItem">gioco 2</h5>
                        </div>

                        <div class="prodotto">
                            <a href="prodotto1.html">
                            <img class="gioco" src="images/lego3.jpg" alt="prodotto  in vendita"/>
                             </a>
                            <h5 class="NomeItem">gioco 3</h5>
                        </div>                       
                    </div>
                    
                    <div id="promozioni">

                      <h4 class="titolo_prodotti">PROMOZIONI</h4>
                     <div id="elencoPromozioni">
                       <div class="singola_promozione">
                          <a href="promo1.html">
                          <img class="promozione" src="images/promo1.jpg" alt="promozione del negozio"/> 
                          </a>
                          <p>Nome_Negozio_1</p>
                       </div>
                       <div class="singola_promozione">
                          <a href="promo2.html">
                          <img class="promozione" src="images/promo2.jpg" alt="promozione del negozio"/>
                          </a> 
                          <p>Nome_Negozio_2</p>
                        </div>
                       <div class="singola_promozione">
                         <a href="promo3.html">
                         <img class="promozione" src="images/promo3.png" alt="promozione del negozio"/> 
                          </a>
                         <p>Nome_Negozio_3</p>
                        </div>
                       <div class="singola_promozione">
                          <a href="promo4.html">
                          <img class="promozione" src="images/promo1.jpg" alt="promozione del negozio"/> 
                          </a>
                          <p>Nome_Negozio_4</p>
                       </div>
                       <div class="singola_promozione">
                         <a href="promo5.html">
                         <img class="promozione" src="images/promo1.jpg" alt="promozione"/> 
                          </a>
                          <p>Nome_Negozio_4</p>
                        </div>
                      </div>


                    </div>
            </div>
         </div>  
';
        }
        else{
            $shop = new shop();
            $result_pro =$shop->all();
            $rows =array();
            while($row = $result_pro->fetch_array(MYSQLI_ASSOC)){
              $rows[] = $row;
            }
            if(!count($rows)){
              echo 'non ci sono negozi';
            }
            else{
              foreach($rows as $row){
                    echo '
                    <div class="vetrina">
                    <a href="negozio.php?shop='.$row['username'].'">
                        <img src="images/logo/'.$row['logo'].'" alt="'.$row['alt'].'"/>
                    </a>
                    <h5 class="NomeItem">'.$row['negozio'].'</h5>
                    </div>';
                }
            }
        }

        echo '</div>';
    }
}
?>
