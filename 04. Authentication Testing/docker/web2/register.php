<?php
session_set_cookie_params(3600,"/");
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Account Management System V4 - Register</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <?php 
    if( !isset($_SESSION["user4l2"]) ){
      echo "<script language=\"javascript\">alert(\"Please login befor using this fat\");document.location.href='index.php';</script>";
    }
    ?>
    <form class="form-signin" method="post" action="register-user.php">
      <img class="mb-4" src="logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Registration Form</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <div class="form-group">
        <label for="inputUsername" class="float-left">Username</label>
        <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="uXXXX" required maxlength="5">
        <small id="usernameHelp" class="form-text text-muted">Enter username start with 'u' follow with 4 Digit.</small>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="float-left">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="YYYY" required maxlength="4">
        <small id="usernameHelp" class="form-text text-muted">Enter password with only 4 Digit.</small>
      </div>
      <div class="checkbox mb-3">
        <label>
        Notice: The system already has <b>a full user account</b>. The administrator has disabled the registration feature.
        </label>
      </div>
      <button class="btn btn-lg btn-secondary btn-block" href="register.php" disabled>Register</button><br/>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>