<?php 
require_once __DIR__.'/../interfacce/type_page.php';
require_once __DIR__.'/../query/shop.php';
require_once __DIR__.'/page_public.php';
require_once __DIR__.'/menu/menu.php';
require_once __DIR__.'/menu/staticMenu.php';


class page_promozione extends page_public{
	private $name;
    private $shop;
	public function __construct(){
        $this->name='promozione';
        page_public::__construct($this->name,new menu((new staticPath())->public_menu('4')));
        if(isset($_GET['name'])){
            $this->shop =': '.$_GET['name'];
        }
	}
	
    public function breadcrumb(){
    	echo '	<div id="breadcrumb">
        			<h2>'.$this->name.$this->shop.'</h2>
    			</div>';
    }

    public function content(){
        echo '<div id="content">';

        if(isset($_GET['name'])){
            require_once __DIR__.'/../HTMLstored/public/alone_promo.php';
        }
        else{
            require_once __DIR__.'/../HTMLstored/public/all_promo.php';
        }

        echo '</div>';
    }
}
?>
