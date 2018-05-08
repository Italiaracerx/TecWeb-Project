<?php 

class menu{
    private $link = array();
    function __construct($mn){
        $this->link =$mn;
    }
    public function print(){
        $str =NULL;
        $str ='<p><a href="#content" class="accesaid">Skip navigation</a></p><ul>';
                        foreach($this->link as $scheda){
                            $str = $str.$scheda->printScheda();
                        }
        return $str.' </ul>';
        
    }
}
?>
