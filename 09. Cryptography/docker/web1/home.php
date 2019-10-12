<?php
session_set_cookie_params(3600,"/");
session_start();

function cryptography( $string, $secret_key, $action = 'e' ) {
  $output = false;
  $encrypt_method = "AES-256-ECB";
  $key = hash( 'sha256', $secret_key );
  if( $action == 'e' ) {
    $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, OPENSSL_RAW_DATA ) );
  }
  else if( $action == 'd' ){
    $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, OPENSSL_RAW_DATA );
  }
  return $output;
}


if( !isset($_GET["key"]) && !isset($_SESSION["user9l1"]) ){
  session_unset();
  session_destroy();
  header("location:index.php");
  // exit;
} else {

  $conn = new mysqli("otg_crypst_db1","root","S3cret99P@ssw0rd","acc_manage_site2");
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $username = "";
  if(isset($_SESSION["pass9l1"]) && isset($_GET["token"])){
    $username = cryptography($_GET["token"], $_SESSION["pass9l1"],'d');
  } else {
    $username = $_SESSION["user9l1"];
  }

  try {

    $stmt = $conn->prepare("SELECT id, username, email, status FROM user WHERE username=? limit 0,1");
    $stmt->bind_param("s", $db_username);
    $db_username = $username;
    $stmt->execute();
    $stmt->bind_result($user_id, $user_username, $user_email, $user_status);
    $stmt->fetch();
    $stmt->close();

    $user = new \stdClass();
    $user->id = $user_id;
    $user->username = $user_username;
    $user->email = $user_email;
    $user->status = $user_status;
    
    $render_profile = '';
    $render_profile = $render_profile . '<p class="lead">';
    $render_profile = $render_profile . '<div class="row"><div class="col-4 text-right">ID:</div><div class="col-8 text-left">' . $user->id . '</div></div>';
    $render_profile = $render_profile . '<div class="row"><div class="col-4 text-right">Username:</div><div class="col-8 text-left">' . $user->username . '</div></div>';
    $render_profile = $render_profile . '<div class="row"><div class="col-4 text-right">Email:</div><div class="col-8 text-left">' . $user->email . '</div></div>';
    $render_profile = $render_profile . '<div class="row"><div class="col-4 text-right">Status:</div><div class="col-8 text-left">' . $user->status . '</div></div>';

    if ($user->username === "admin"){
      $render_profile = $render_profile . '<div class="row"><div class="col-4 text-right">Flag: </div><div class="col-8 text-left">FLAG{PPPPPPPPPPPPPPPPP@dD1nG_Or@cL3}</div></div>';
    } else {
      $render_profile = $render_profile . '<p class="lead">Are you satisfied, only have access with regular user?</p>';
    }

    $render_profile = $render_profile . '</p>';
  } catch (PDOException $e) {
      log_error("Failed to select user", $e->getMessage(), $e->getCode(), array('exception' => $e));
      session_unset();
      session_destroy();
      header('Location:index.php');
  } 
  $conn->close();

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

    <title>Account Management System V2</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Welcome</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link"><?php echo $username ?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link">(UserID : <?php echo $user->id; ?>)</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" method="GET" action="logout.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5">User Profile:</h1>
      <?php if ( isset($render_profile) ){ echo $render_profile; } ?>
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted"></span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>