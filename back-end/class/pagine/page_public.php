<?php 
require_once __DIR__.'/../interfacce/type_page.php';


class page_public implements type_page{
	private static $style="style.css";
	private $menu;
	private $name;
	private $javascript;

	public function __construct($name, menu $menu, $js =NULL){
		$this->name =$name;
		$this->menu =$menu;
		$this->javascript =$js;
	}
	public function intestazione(){
		$file = file_get_contents('../class/HTMLstored/public/preambolo.html', FILE_USE_INCLUDE_PATH);
		$file = str_replace('__USER__',$_SESSION['user'],$file);
		$file = str_replace('__NAME_PAGE__',$this->name,$file);
		$file = str_replace('__STYLE__',page_private::$style,$file);
		$js =NULL;
		if($this->javascript != NULL){
			$js ='<script type="text/javascript" src="Javascript/'.$this->javascript.'.js"></script>';
		}
		$file = str_replace('__JAVASCRIPT__',$js,$file);
		echo $file;
    }
    public function header(){
        echo '	
        <div id="header">	    
            <div id="contenutoHeader">
                <img id="logo" alt="logo" src="images/logo.jpg"/>						
                <div id="titolo">
                    <h1>Archimede</h1>
                    <h3>Centro Commerciale</h3>
                </div>
            </div>
        </div>';
	}
	public function menu(){
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
                <div id="contentMenuFooter">
                <ul>
                <li><a href="#header"><span xml:lang="en">Home</span></a></li>
                <li><a href="negozi.html">Negozi</a></li>
                <li><a href="dovesiamo.html">Dove siamo</a></li>
                <li><a href="contatti.html">Contatti</a></li>
                <li><a href="promozioni_public.html">Promozioni</a></li>
                </ul>
            </div>
        </div>

            <h3>Centro Commerciale Archimede</h3>
            <img id="logoFooter" alt="logofooter" src="images/logo.jpg"/>
            <div id="infoFooter">
            <p>Via Trieste, 63  | 35121 Padova (<span xml:lang="en">Italy</span>)| Telefono: +39 049 827 1200 | <span xml:lang="en">e-mail</span>:info@centro.archimede.it</p>
            </div> <!-- fine contatti_footer--></div>';
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
}
?>
