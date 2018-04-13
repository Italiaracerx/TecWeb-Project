<?php
require_once("schedaMenu.php");

class staticPath{
    private static $link_logout="../../../mainForm/logout.php";
    private static $link_admin="../../../mainPage/general_admin.php";
    private static $link_general_private="../../../mainPage/general_private.php";
    private static $link_promozioni_private="../../../mainPage/promozioni_private.php";
    private static $link_prodotti_private="../../../mainPage/prodotti_private.php";
    private static $link_negozio="../../../mainPage/negozio.php";    

    public function admin(){
        $admin = array();
        $admin[]=new schedaMenu(staticPath::$link_logout,"Logout");
        return $admin;
    }
    public function private(){
        $private = array();
        $private[]=new schedaMenu(staticPath::$link_general_private,"Generale");
        $private[]=new schedaMenu(staticPath::$link_promozioni_private,"Promozioni");
        $private[]=new schedaMenu(staticPath::$link_prodotti_private,"Prodotti");
        $private[]=new schedaMenu(staticPath::$link_negozio,"Link Negozio");
        $private[]=new schedaMenu(staticPath::$link_logout,"Logout");
        return $private;
    }
    public function login(){
        $login = array();
        return $login;
    }

}

?>