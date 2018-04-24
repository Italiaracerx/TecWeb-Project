<?php 
require_once __DIR__.'/../interfacce/type_page.php';


class page_private implements type_page{
	private static $style="private_style.css";
	private $menu;
	private $name;
	private $javascript;

	public function __construct($name, menu $menu, $js =NULL){
		$this->name =$name;
		$this->menu =$menu;
		$this->javascript =$js;
	}
	public function intestazione(){
		$file = file_get_contents('../../class/HTMLstored/private/preambolo.html', FILE_USE_INCLUDE_PATH);
		$file = str_replace('__USER__',$_SESSION['user'],$file);
		$file = str_replace('__NAME_PAGE__',$this->name,$file);
		$file = str_replace('__STYLE__',page_private::$style,$file);
		$js =NULL;
		if($this->javascript != NULL){
			$js ='<script type="text/javascript" src="../Javascript/'.$this->javascript.'.js"></script>';
		}
		$file = str_replace('__JAVASCRIPT__',$js,$file);
		echo $file;
    }
    public function header(){
		$file = file_get_contents('../../class/HTMLstored/private/header.html', FILE_USE_INCLUDE_PATH);
        echo $file;
	}
	public function menu(){
		echo '<div id="menu">';
		$this->menu->print();
		echo '</div>';
	}		
    public function breadcrumb(){
    	$file ='<div id="breadcrumb"><h2><strong>';
    	if($_SESSION['user'] != NULL){
    		$file =$file.$_SESSION['user'].' -> </strong> '.$this->name.'</h2></div>';
    	}
    	else{
    		$file =$file.$this->name.'</strong></h2></div>';
    	}
    	echo $file;
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
				</html>
				</body>
				</html>';
    }
    public function body(){
		$this->header();
		$this->menu();
    	$this->breadcrumb();
    	$this->print_bar();
    }
	public function head(){
		$this->intestazione();
		$this->body();
	}
}
?>
