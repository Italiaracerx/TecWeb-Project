<?php

require_once("../class/log.php");
$log = new log($_POST['username'],$_POST['password']);
$log->read();

?>
