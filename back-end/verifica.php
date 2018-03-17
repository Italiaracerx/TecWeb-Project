<?php

include("classi.php");
$log = new log($_POST['username'],$_POST['password']);
$log->read();

?>