<?php 
IF(ISSET($_GET['destroy'])){
	session_start();
	session_destroy();
	header('Location:login.php');
}
?>