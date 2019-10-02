<?php
session_set_cookie_params(3600,"/");
session_start();
if( isset($_SESSION["user4l2"]) ){
  header("location:home.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Account Management System V4</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="login.php">
      <img class="mb-4" src="logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Version 4.0</h1>
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
        Notice: The system already has <b>a full user account</b>. The administrator has disabled the registration feature.
        </label>
      </div>
      <?php if (isset($_GET["error"])){ ?>
        <div class="alert alert-warning" role="alert">
        <?php echo($_GET["error"]); ?>
        </div>      
      <?php } ?>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br/>
      <button class="btn btn-lg btn-secondary btn-block" href="register.php" disabled>Register</button><br/>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>
