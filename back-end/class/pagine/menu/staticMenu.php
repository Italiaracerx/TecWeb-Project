<?php
require_once __DIR__.'/schedaMenu.php';
//penso vadano inseriti gl indirizzi assoluti...
class staticPath{
    private static $link_logout='mainForm/logout.php';
    private static $link_admin='/../general_admin.php';
    private static $link_general_private='general_private.php';
    private static $link_promozioni_private='promozioni_private.php';
    private static $link_prodotti_private='prodotti_private.php';
    private static $link_negozio='negozio.php';
    private static $link_home='home.php';
    private static $link_promozioni='promozioni.php';
    private static $link_dove_siamo='dove_siamo.php';
    private static $link_contatti='contatti.php';

    public function admin(){
        $admin = array();
        $admin[]=new schedaMenu("Logout",staticPath::$link_logout);
        return $admin;
    }
    public function user($active){
        $private = array();
        $private[]=new schedaMenu("Generale",staticPath::$link_general_private);
        $private[]=new schedaMenu("Promozioni",staticPath::$link_promozioni_private);
        $private[]=new schedaMenu("Prodotti",staticPath::$link_prodotti_private);
        $private[]=new schedaMenu("Link Negozio",staticPath::$link_negozio);
        $private[]=new schedaMenu("Logout",staticPath::$link_logout);
        if($active < '5'){
        $private[$active]->activation();
        }
        return $private;
    }
    public function login(){
        return array();
    }
    public function public_menu($active){
        $private = array();
        $private[]=new schedaMenu("Home",staticPath::$link_home);
        $private[]=new schedaMenu("Negozio",staticPath::$link_negozio);
        $private[]=new schedaMenu("Dove siamo",staticPath::$link_dove_siamo);
        $private[]=new schedaMenu("Contatti",staticPath::$link_contatti);
        $private[]=new schedaMenu("Promozioni",staticPath::$link_promozioni);
        if($active < '5'){
        $private[$active]->activation();
        }
        return $private;
    }

}

?>
