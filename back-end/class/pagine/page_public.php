<?php 
require_once __DIR__.'/../interfacce/type_page.php';


class page_public implements type_page{
	private static $style="style.css";
	private $menu;
	private $name;
	private $lang;

	public function __construct($name, menu $menu,$lg =NULL){
		$this->name =$name;
		$this->menu =$menu;
		$this->lang =NULL;
		if($lg != NULL){
			$this->lang ='xml:lang="'.$lg.'"';
		}
	}
	public function intestazione(){
		$file = file_get_contents('../../class/HTMLstored/public/preambolo.html', FILE_USE_INCLUDE_PATH);
		$file = str_replace('__NAME_PAGE__',$this->name,$file);
		$file = str_replace('__STYLE__',page_public::$style,$file);

		echo $file;
    }
    public function header(){
        $file = file_get_contents('../../class/HTMLstored/public/header.html', FILE_USE_INCLUDE_PATH);
        echo $file;
	}
	public function menu(){
		$skip ='<p><a xml:lang="en" href="#content" class="accesaid">Skip navigation</a></p>';
		$str ='<div id="menu">
			'.$skip.$this->menu->print().'</div>';
		echo $str;
	}		
    public function breadcrumb(){
    	echo '	<div id="breadcrumb">
        			<h2 '.$this->lang.'>'.$this->name.'</h2>
    			</div>';
    }
    public function footer(){
		echo '
		<div id="footer">
		<div id="footerMenu">
			 <div id="contentMenuFooter">
			'.$this->menu->print().'
		 </div>
	   </div>
	   <h3>Centro Commerciale Archimede</h3>
	   <img id="logoFooter" alt="Logo del centro commerciale" src="images/default/logo.jpg"/>
	   <div id="infoFooter">
	   <p>Via Trieste, 63  | 35121 Padova (<span xml:lang="en">Italy</span>)| Telefono: +39 049 827 1200 | <span xml:lang="en">e-mail</span>:info@centro.archimede.it</p>
	   </div>
</div>

</body>
</html>
		';
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
