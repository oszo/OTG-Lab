<?php
    session_set_cookie_params(3600,"/");
    session_start();
    if( isset($_SESSION["user5l1"]) ){
        header("location:index.php?page=dashboard");
        exit;
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password']) ) {

      $user_status = false;
      $username = $_POST['username'];
      if (strlen($username) == 7) {
        $prefix_username = substr($username, 0, 3);
        $subfix_username = substr($username, 3);
        if ($prefix_username === "EPY" && 
            is_numeric($subfix_username) &&
            1 < (int)$subfix_username && 
            (int)$subfix_username < 10000 &&
            md5($_POST['password']) === "9c7ec1b1c7e19afe11b8cfa3eb3cc47f"){
              $user_status = true;
              $_SESSION["user5l1"] = $_POST['username'];
              $_SESSION["pass5l1"] = $_POST['password'];
              header("location:index.php?page=dashboard");
              exit;
        }
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

    <title>Sale-Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
  </head>

  <body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand text-success">Vuln-Company</h3>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h2 class="cover-heading">Login to Sale-Dashboard</h2>
        <p class="lead">

            <form class="text-left" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="text-center">
                    <p id="emailHelp" class="form-text text-muted">Guide for new employees <a href="manual.pdf" target="_blank">Download</a></p>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-lg btn-block btn-success" name="login" value="Login">
                </div>

<?php 
    if( isset($user_status) && $user_status==false ){
        echo ' 
                <div class="text-center">
                    <p id="emailHelp" class="form-text text-danger">Username หรือ Password ไม่ถูกต้อง</p>
                </div>
        ';
    }
?>

            </form>

        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Power by <a href="#">Vuln-Company</a>.</p>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery-3.3.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
