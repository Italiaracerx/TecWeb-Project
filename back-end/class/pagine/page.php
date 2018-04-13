<?php 
class page{
	private static $style="private_style.css";
	private $pag_corrente;
	
	function __constructor(page_template $pg){
		$this->pag_corrente=$pg;
	}
	public function intestazione(){
    echo '	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="txt/html charset= UTF-8" />
				<title>Centro Archimede: '.$this->pag_corrente->getNamePage().'</title>
				<link rel="stylesheet" type="text/css" href="'.page::$style.'" media="handheld, screen"/>
			</head>';
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
