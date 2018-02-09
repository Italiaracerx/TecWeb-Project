<?php
session_start();
include("connessione_db.php");
//-----------------------------------------
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//funzione per il check degli errori

function checker($imageFileType){

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
if($uploadOk==0){
	return false;
}
} else {
	return true;
}
}

if(checker($imageFileType)=="true"){
	$user=$_SESSION["cod"];
	/*if($_SESSION['flag_text']=='PaginaGenerale'){
	}*/

	//sistemare il problema del nome dei file promozione
	//metti nel posto giusto la riga 62 affinchè venga scritto il nome giusto della promozione (recupera il vecchio path quando ci sono 3+ righe, fai quello nuovo quando ce ne sono di meno)
/*
	if($_SESSION['flag_text']=='promozioni'){
	$target_file=$target_dir."promozione".$user.".".$imageFileType;
	}
	*/
	if($_SESSION['flag_text']=='prodotti'){
	$target_file=$target_dir."prodotto".$user.".".$imageFileType;
	}

	if($_SESSION['flag_text']=='PaginaGenerale'){
   		$target_file=$target_dir."logo".$user.".".$imageFileType;
   		$target_name="logo ".$user;
   		$query="SELECT * FROM logo WHERE username='$user'";
		$ris=mysqli_query($connessione,$query);
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && !$risultato=mysqli_fetch_array($ris)){
		$query="INSERT INTO logo VALUES ('$user', '$target_file', '$target_name');";
		}
	}

	if($_SESSION['flag_text']=='promozioni'){
		$desc=$_POST['text'];
		$query="SELECT * FROM promozioni WHERE username='$user'";
		$ris=mysqli_query($connessione,$query);
		$number=0;
		while($risultato=mysqli_fetch_array($ris)){
			$number++;
		}
		if($number>=3){
			$query="SELECT * FROM promozioni WHERE username='$user' ORDER BY data ASC LIMIT 1;";
			$ris=mysqli_query($connessione,$query);
			$risultato=mysqli_fetch_array($ris);
			$target_file=$risultato['promozione'];
			echo "$target_file";
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
				$query="UPDATE promozioni SET alt='$desc', data=CURRENT_TIME WHERE promozione='$target_file' AND username='$user';";
				mysqli_query($connessione,$query);
			}
		}
		else{
			$number++;
			$target_file=$target_dir."promozione".$user."_".$number.".".$imageFileType;
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){			
				$query="INSERT INTO promozioni VALUES ('$user', '$target_file','$desc', DEFAULT);";
				mysqli_query($connessione,$query);
			}
		}
	}

	if($_SESSION['flag_text']=='prodotti'){

		$desc=$_POST['text'];
		$query="SELECT * FROM prodotti WHERE username='$user'";
		$ris=mysqli_query($connessione,$query);
		$number=0;
		while($risultato=mysqli_fetch_array($ris)){
			$number++;
		}
		if($number>=3){
			$query="SELECT * FROM prodotti WHERE username='$user' ORDER BY data ASC LIMIT 1;";
			$ris=mysqli_query($connessione,$query);
			$risultato=mysqli_fetch_array($ris);
			$target_file=$risultato['prodotto'];
			echo "$target_file";
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
				$query="UPDATE prodotti SET alt='$desc', data=CURRENT_TIME WHERE prodotto='$target_file' AND username='$user';";
				mysqli_query($connessione,$query);
			}
		}
		else{
			$number++;
			$target_file=$target_dir."prodotto".$user."_".$number.".".$imageFileType;
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){			
				$query="INSERT INTO prodotti VALUES ('$user', '$target_file','$desc', DEFAULT);";
				mysqli_query($connessione,$query);
			}
		}
	}


			$desc=$_POST['text'];
			$query="INSERT INTO prodotti VALUES ('$user', '$target_file','$desc', DEFAULT);";
			mysqli_query($connessione,$query);
		}



//    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	
        /*echo "The file ".  " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }*/
}
header("location: /darossi/privato/generale_private.php"); exit();
?>