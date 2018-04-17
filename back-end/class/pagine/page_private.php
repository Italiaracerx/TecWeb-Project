<?php 
require_once __DIR__.'\..\interfacce\type_page.php';


class page_private implements type_page{
	private static $style="private_style.css";
	private $pag_corrente;
	
	function __construct(page_template $pg){
		$this->pag_corrente=$pg;
	}
	public function intestazione(){
		$file = file_get_contents('./preambolo.html', FILE_USE_INCLUDE_PATH);
		$file = str_replace('__USER__',$_SESSION['user'],$file);
		$file = str_replace('__NAME_PAGE__',$this->pag_corrente->getNamePage(),$file);
		$file = str_replace('__STYLE__',page_private::$style,$file);
		echo $file;
    }
    public function header(){
    	echo '	<div id="header">
   				    <div id="titolo">
		                <h3>CENTRO COMMERCIALE ARCHIMEDE</h3>
		                <h1>AMMINISTRAZIONE</h1>
					</div>
				</div>';
	}
	public function menu(){
		$this->pag_corrente->menu();
	}		
    public function breadcrumb(){
    	echo '	<div id="breadcrumb">
        			<h2><strong>'.$this->pag_corrente->getNamePage().'</strong></h2>        
    			</div>';
    }
    public function print_bar(){
        if($_SESSION['flag'] != NULL){
            echo '<h2 id="'.$_SESSION['flag'].'">'.$_SESSION['flag_text'].'</h2>';
        }
    }
    public function footer(){
    	echo '  <div id="footer">
    			</div>
				</body>
				</html>';
    }
    public function body(){
		$this->header();
		$this->menu();
    	$this->breadcrumb();
    	$this->print_bar();
		$this->pag_corrente->getPage();
		$this->footer();

    }
	public function printHTML(){
		$this->intestazione();
		$this->body();

	}
}
?>
