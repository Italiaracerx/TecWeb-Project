<?php 
require_once __DIR__.'/../interfacce/type_page.php';
require_once __DIR__.'/../query/shop.php';
require_once __DIR__.'/page_public.php';
require_once __DIR__.'/menu/menu.php';
require_once __DIR__.'/menu/staticMenu.php';


class negozi extends page_public{
	private $name;
    private $shop;
	public function __construct(){
        $this->name='negozio';
        page_public::__construct($this->name,new menu((new staticPath())->public_menu('1')));
        if(isset($_GET['shop'])){
            $this->shop =': '.$_GET['shop'];
        }
	}
	
    public function breadcrumb(){
    	echo '	<div id="breadcrumb">
        			<h2><strong>'.$this->name.'</strong>'.$this->shop.'</h2>
    			</div>';
    }

    public function content(){
        echo '<div id="content">';

        if(isset($_GET['shop'])){
            require_once __DIR__.'/../HTMLstored/public/alone_shop.php';
        }
        else{
            require_once __DIR__.'/../HTMLstored/public/all_shop.php';
        }

        echo '</div>';
    }
}
?>
