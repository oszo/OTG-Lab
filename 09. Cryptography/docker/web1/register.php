<?php
session_set_cookie_params(3600,"/");
session_start();

$insert_status = false;
$user_token = "";
$user_key = "";

function cryptography( $string, $action = 'e' ) {
  $output = false;
  $encrypt_method = "AES-256-ECB";
  $key = hash( 'sha256', ".x(?xPs&Q_iOt:_60GRc]w\M3qOW&?," );
  if( $action == 'e' ) {
    $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, OPENSSL_RAW_DATA ) );
  }
  else if( $action == 'd' ){
    $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, OPENSSL_RAW_DATA );
  }
  
  return $output;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password']) && strtolower($_POST['username']) !== "admin") {
  $email = "";
  if (isset($_POST['email'])){
    $email = $_POST['email'];
  }

  $conn = new mysqli("otg_crypst_db1","root","S3cret99P@ssw0rd","acc_manage_site2");
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  $stmt = $conn->prepare("INSERT INTO user (username, password, email, status) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $cus_username, $cus_password, $cus_email, $cus_status);

  $cus_username = $_POST['username'];
  $cus_password = md5($_POST['password']);
  $cus_email = $email;
  $cus_status = "active";
  $stmt->execute();

  $conn->close();

  $_SESSION["pass9l1"] = $cus_password;
  $user_token = cryptography($cus_username, 'e');
  $insert_status = true;
} else if (isset($_POST['username']) && strtolower($_POST['username']) == "admin"){
  echo "<script>alert('User admin is already exists.');</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Customer Survey</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="/img/logo.jpg" alt="" width="72" height="72">
        <h2>Register</h2>
        <p class="lead">Enter username, password and email for registeration.</p>
      </div>

  <div class="row">
    <div class="col-md-12 order-md-1">
      <h4 class="mb-3">User Info</h4>
      <form class="needs-validation" novalidate method="post">
        <div class="row">

          <div class="col-md-6 mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid Username is required.
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid Password is required.
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>
        </div>

        <br/>        
        <input class="btn btn-success btn-lg btn-block" type="submit" value="Register">
        <?php if ($insert_status){ ?>
          <br/>
          <div class="mb-12">
            <div class="alert alert-success" role="alert">
              Thank You, click <a href="home.php?token=<?php echo(urlencode($user_token)); ?>">HERE</a> to auto login.
            </div>
          </div>
        <?php } ?>        
      </form>
    </div>
  </div>

  <hr class="mb-4">
  
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2020 Vuln Company</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="/">< Back</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/form-validation.js"></script>
<script>
$( document ).ready(function() {
  document.getElementById("username").onkeypress = function(e) {
    return /^[a-zA-Z0-9'?@()-.]+$/.test(String.fromCharCode(e.which));
  };
  document.getElementById("password").onkeypress = function(e) {
    return /^[a-zA-Z0-9'?@()-.]+$/.test(String.fromCharCode(e.which));
  };
  document.getElementById("email").onkeypress = function(e) {
    return /^[a-zA-Z0-9'?@()-.]+$/.test(String.fromCharCode(e.which));
  };
  document.getElementById("recommend").onkeypress = function(e) {
    return /^[a-zA-Z0-9'?@()-.]+$/.test(String.fromCharCode(e.which));
  };
});
</script>
</body>
</html>