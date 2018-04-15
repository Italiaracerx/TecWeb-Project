<?php 

class menu{
    private $link = array();
    function __construct($mn){
        $this->link =$mn;
    }
    public function print(){
        echo '	<div id="menu">
                    <p><a href="#content" class="accesaid">Skip navigation</a></p>
                    <ul>';
                        foreach($this->link as $scheda){
                            echo $scheda->printScheda();
                        }
        echo ' </ul> 
            </div>';
    }
}
?>
