<!DOCTYPE HTML>
<html>
<head>
<title>Bootstrap Login</title>

<!-- bootstrap-3.3.7 -->
<link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
<script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>

<!-- JQUERY -->
<script type="text/javascript" language="javascript" src="jquery/jquery.js"></script>

<link href="style/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" language="javascript" src="style/style.js"></script>

</head>
<body>

<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"  name="login">Sign in</button>
            </form>

        </div>
</div>

</body>
</html>
<?php
include "db_con.php";
IF(ISSET($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

/*
	IF($username == 'admin' and md5($password) == '0e462097431906509019562988736855')
	{

		session_start();
		$_SESSION['username'] = "admin";

		echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='index.php?page=welcome.php';</script>";
	}else{
		echo "<script language=\"javascript\">alert(\"Invalid username or password\");document.location.href='login.php';</script>";
	}
  */

  $result = mysql_query("SELECT password FROM tbl_users WHERE username='$username' limit 0,1");
  $cek = mysql_num_rows($result);
  $data = mysql_fetch_array($result, MYSQL_ASSOC);
  #echo $data['password'];


  IF (($cek > 0) and (md5($password) == $data['password']))
  {

  	session_start();
  	$_SESSION['username'] = $username;
  	$_SESSION['name'] = $data['full_name'];
  	echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='index.php?page=welcome.php';</script>";
  }else{
  	echo "<script language=\"javascript\">alert(\"Invalid username or password\");document.location.href='login.php';</script>";
  }
}
?>
