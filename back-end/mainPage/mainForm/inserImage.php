<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
    require_once __DIR__.'/../../class/query/image.php';
    
    $description;
    if($_SESSION['flag_text']=='promozioni' || $_SESSION['flag_text']=='prodotti'){
        $description=$_POST['text'];
    }

    $image=new image($_SESSION["cod"], $_SESSION['flag_text'], $description, $_FILES["fileToUpload"]["tmp_name"], strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $image.checker(isset($_POST["submit"]), $_FILES["fileToUpload"]["size"]);
    $controller=new controller($image);
    $controller.write();
?>