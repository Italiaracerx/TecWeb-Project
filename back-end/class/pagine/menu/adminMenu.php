<?php 
class adminMenu implements menu{
    private static $logout="../../../mainForm/logout.php";
    public function print(){
        echo '	<div id="menu">
                    <p><a href="#content" class="accesaid">Skip navigation</a></p>
                    <ul>';
                        <li><a href="'.adminMenu::$logout.'">Logout</a></li>
        echo ' </ul> 
                </div>';
    }
}
?>