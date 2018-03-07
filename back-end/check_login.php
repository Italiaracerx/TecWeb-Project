<?php
    session_start();
	if ($_SESSION == NULL){
		include('config_session.php');
    }

    if($_SESSION['type'] != NULL){
        header("Location: ".$_SESSION['link'].".php");
    }
?>
