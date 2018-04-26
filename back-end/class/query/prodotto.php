<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/image.php';


class logo extends image{
        private $directory;
        //costruttore della classe inputPicture

        public function __construct(){
            $this->directory ='prodotto';
            parent::__construct($this->directory);

        }
        public function write(){}
        public function read(){}
    }
    
?>