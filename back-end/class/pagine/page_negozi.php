<?php 
require_once __DIR__.'/../interfacce/type_page.php';
require_once __DIR__.'/../query/shop.php';


class negozi implements type_page{
	private static $style="style.css";
	private $menu;
	private $name;
    private $shop;
	public function __construct(menu $menu){
        $this->name ='negozio';
        if(isset($_GET['shop'])){
            $this->shop =': '.$_GET['shop'];
        }
		$this->menu =$menu;
	}
	
    public function breadcrumb(){
    	echo '	<div id="breadcrumb">
        			<h2><strong>'.$this->name.'</strong>'.$this->shop.'</h2>
    			</div>';
    }
    public function footer(){
        echo '       
        <div id="footer">
            <div id="footerMenu">
                <div id="contentMenuFooter">';
                    $this->menu();
                echo '
            </div>
        </div>

            <h3>Centro Commerciale Archimede</h3>
            <img id="logoFooter" alt="logofooter" src="images/default/logo.jpg"/>
            <div id="infoFooter">
            <p>Via Trieste, 63  | 35121 Padova (<span xml:lang="en">Italy</span>)| Telefono: +39 049 827 1200 | <span xml:lang="en">e-mail</span>:info@centro.archimede.it</p>
			</div> <!-- fine contatti_footer--></div>
			</body>
			</html>';
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
