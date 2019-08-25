<?php
  session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Bootstrap Login</title>

<!-- bootstrap-3.3.7 -->
<link rel="stylesheet" href="/newassets/bootstrap-3.3.7/css/bootstrap.min.css">
<script src="/newassets/bootstrap-3.3.7/js/bootstrap.min.js"></script>

<!-- JQUERY -->
<script type="text/javascript" language="javascript" src="/newassets/jquery/jquery.js"></script>

<link href="/newassets/style/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" language="javascript" src="/newassets/style/style.js"></script>

</head>
<body>

<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="/newassets/img/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="" method="GET">
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
IF(ISSET($_GET['login'])){
	$username = $_GET['username'];
	$password = $_GET['password'];
  
  try {
    $sth = $dbh->prepare("SELECT password FROM tbl_users WHERE username=? limit 0,1");
    $sth->execute(array($username));
    $result = [];
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
      $result[] = $row;
    }
    if(!$result) exit('No rows');
    if (md5($password) == $result[0]['password'])
    {
      $_SESSION['username'] = $username;
      $_SESSION['pass'] = $password;
      echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='index.php';</script>";
    }else{
      echo "<script language=\"javascript\">alert(\"Invalid username or password\");document.location.href='login.php';</script>";
    }
  } catch (PDOException $e) {
    log_error("Failed to select user", $e->getMessage(), $e->getCode(), array('exception' => $e));
  }

}
?>
