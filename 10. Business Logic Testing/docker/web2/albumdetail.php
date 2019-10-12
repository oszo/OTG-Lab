<?php
	include_once('connectdb.php');
	session_start();
	if( !isset($_SESSION["user"]) ){
		header("location:index.php");
		exit;
	}
	$user = json_decode($_SESSION["user"]);

	$query = "select id,album_name from album_catalog";
	$result = mysqli_query($conn, $query);

include "header.php";
?>
<div class="row">
	<div class="col-sm-12">
<?php

	$query = "select id,album_name,album_subtitle,album_detail from album_catalog where id = " . $_GET['id'];
    $result = mysqli_query($conn, $query);
	if($result->num_rows > 0)
	{
        echo '<br><br>';
		echo '<h3 class="masthead-brand text-success">Success</h3>';
		echo "This album is on the server.<br>";
    }
    else{
		echo '<br><br>';
		echo '<h2 class="masthead-brand text-warning">Warning</h2>';
		echo "Album not found on the server.<br><br>";
    }

?>
		<br>
		<a href="albumlist.php" class="btn btn-danger" >Back</a>
	</div>
</div>
<?php
include "footer.php";
?>
