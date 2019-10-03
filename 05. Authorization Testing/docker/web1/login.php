<?php
    session_set_cookie_params(3600,"/");
    session_start();
    if( isset($_SESSION["user3l2"]) ){
        header("location:index.php?page=dashboard");
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password']) ) {
      function a( $string, $action = 'e' ) {
        // you may change these values to your own
        $secret_key = $_POST['password'];
        $secret_iv = 's3cret_iv';
        
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

      $user_status = false;
      $users = array("eXE4cXl2eE5uamNOOURiZllQU2RQQT09", "cHNFV1dpZDZERW9JLzZ3VWFLeGVCQT09", "djNZTjlpK2xxV0pqOHNZbEdiNDZ4UT09", "SEpLdTFDT2szUFpTK1pBL2htL2k4dz09", "ZEJQbEx3dEFjOXRoTzJSbUpNUW1wZz09", "WDVVaDEwaGJ3WnU3dDFRQ2tFYnFLQT09", "ZzA0dUZELzlWOThQWXZpaWY2VFBiZz09", "eHFmWXNaL0N6S0c5azVab09uMlBYdz09", "Y243cmZiMEE1RC9yVnFKblZxRU1iUT09"); 
      foreach ($users as $user) {
          if ( $user === a($_POST['username'], 'e') ){
              $user_status = true;
              $_SESSION["user3l2"] = $_POST['username'];
              $_SESSION["pass"] = $_POST['password'];
              header("location:index.php?page=dashboard");
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
