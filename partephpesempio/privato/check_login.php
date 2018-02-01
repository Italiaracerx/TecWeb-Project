<?php
session_start();

 $aut = $_SESSION['autorizzato'];
if ($aut) {
if($_SESSION["cod"] == "admin"){
 	echo '<script language=javascript>document.location.href="../privato/admin.php"</script>';
}
else{	
 	echo '<script language=javascript>document.location.href="../privato/generale.php"</script>';
} 
}
?>