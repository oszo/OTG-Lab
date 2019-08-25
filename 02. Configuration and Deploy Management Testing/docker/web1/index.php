<?php 
session_start();
if(isset($_SESSION['username'])){

	function my_simple_crypt( $string, $action = 'e' ) {
		// you may change these values to your own
		$secret_key = $_SESSION['pass'];
		$secret_iv = 'my_simple_secret_iv';
	 
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$key = hash( 'sha256', $secret_key );
		$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	 
		if( $action == 'e' ) {
			$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		}
		else if( $action == 'd' ){
			$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		}
	 
		return $output;
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Bootstrap Login</title>
<!-- bootstrap-3.3.7 -->
<link rel="stylesheet" href="/newassets/bootstrap-3.3.7/css/bootstrap.min.css">
<script src="/newassets/bootstrap-3.3.7/js/bootstrap.min.js"></script>

<!-- JQUERY -->
<script type="text/javascript" language="javascript" src="/newassets/jquery/jquery.js"></script>

</head>

<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Home </a>
				<a class="navbar-brand pull-right" href="logout.php?destroy"> <span class="glyphicon glyphicon-off"></span> Logout </a>
				<a class="navbar-brand pull-right"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['name'];?> </a>
            </div>
	</div>

</div>

<div class="container">

<h2>Hallo <?php echo $_SESSION['name']; ?></h2>
<br>
<?php
if ($_SESSION['username'] === 'admin')
{
	echo "<h3>Good job!!</h3>";
	echo "<h3>";
	echo my_simple_crypt("SW9Rc0tPZ3gxYnA2SGpYK2NPY0s3M2ZBem9qeXgwWUF5a1ZGRXZVcTJuQT0=
	", 'd' );
	echo "</h3>";
}
?>
<br>
</div>
</body>
</html>

<?php 
}else{
	echo "<script language=\"javascript\">alert(\"Please login\");document.location.href='login.php';</script>";	
}
?>
