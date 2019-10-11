<?php
session_set_cookie_params(3600,"/");
session_start();
if( isset($_SESSION["user7l1"]) ){
  header("location:admin.php");
  exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inputUsername']) && isset($_POST['inputPassword'])) {

    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];
    
    try {

      $conn = new mysqli("otg_crypst_db1","root","S3cretP@ssw0rd3","acc_manage_site");
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      
      $stmt = $conn->prepare("SELECT id, password FROM user WHERE username=? limit 0,1");
      $stmt->bind_param("s", $db_username);
      $db_username = $username;
      $stmt->execute();
      $stmt->bind_result($user_id, $user_password);
      $stmt->fetch();
      $stmt->close();

      if (md5($password) == $user_password)
      {
          $user = new \stdClass();
          $user->id = $user_id;
          $userJSON = json_encode($user);
          $_SESSION["user7l1"] = $userJSON;
          $cookie_name = "userProfileId";
          $cookie_value = base64_encode($user->id);
          setcookie($cookie_name, $cookie_value);
          header('Location:admin.php');
          exit;
      }

      $conn->close();
  } catch (PDOException $e) {
      log_error("Failed to select user", $e->getMessage(), $e->getCode(), array('exception' => $e));
      session_unset();
      session_destroy();
  }    
} else {
    session_unset();
    session_destroy();
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

    <title>Customer Survey - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post">
      <img class="mb-4" src="logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
        Sorry, guessing the password doesn't work for this lab.
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" id="loginbutton" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>
