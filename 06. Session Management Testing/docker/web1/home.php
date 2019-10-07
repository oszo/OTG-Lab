<?php
require_once 'jwt/BeforeValidException.php';
require_once 'jwt/ExpiredException.php';
require_once 'jwt/SignatureInvalidException.php';
require_once 'jwt/JWT.php';

use \Firebase\JWT\JWT;
$key = JWT::base64_decoder("Vm0weGQxTXdNVWhTYmtwT1ZtMVNXVll3WkRSV2JGbDNXa1JTVjFadGVEQmFWVll3VjBaS2RHVkdiR0ZTVmxwb1ZsVmFWMVpWTVVWaGVqQTk=");

function xe( $string, $secret_key = "" ,$action = 'e' ) {
  $secret_iv = 's3cret_iv';
  $output = false;
  $encrypt_method = "AES-256-CBC";
  $key = hash( 'sha256', $secret_key );
  $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
  if( $action == 'e' ) {
    $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
  } else if( $action == 'd' ){
    $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
  }
  return $output;
}

try { 
  if ( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["usertoken"]) && strlen($_GET["usertoken"])>0 ){
    $usertoken_to_verify = $_GET["usertoken"]; 
    $user = JWT::decode($usertoken_to_verify, $key, array('HS256'));

    if ($user->user_id === "000"){
      $user->name = "admin";
      $user->flag = "FLAG{".xe("V1BNS0xCanBhc1RGRExKbzVGTjdjaWFSc3Y5ZHJQOFlmU1JEQ3k0MWh6MD0=",$user->name,'d')."}";
    } elseif ($user->user_id === "001"){
      $user->name = "noadmin";
      $user->flag = "^^!";
    } elseif ($user->user_id === "002"){
      $user->name = "sensibus";
      $user->flag = "^^!!";
    } elseif ($user->user_id === "003"){
      $user->name = "vis";
      $user->flag = "^^!!!";
    } elseif ($user->user_id === "004"){
      $user->name = "Agam";
      $user->flag = "^^!!!!";
    } elseif ($user->user_id === "005"){
      $user->name = "definitiones";
      $user->flag = "^^!!!!!";
    } elseif ($user->user_id === "006"){
      $user->name = "Te";
      $user->flag = "^^!!!!!!";
    } elseif ($user->user_id === "007"){
      $user->name = "corpora";
      $user->flag = "^^!!!!!!!";
    } elseif ($user->user_id === "008"){
      $user->name = "guest";
      $user->flag = "^^!!!!!!!!";
    } elseif ($user->user_id === "009"){
      $user->name = "Mel";
      $user->flag = "^^!!!!!!!!!";
    } elseif ($user->user_id === "010"){
      $user->name = "omittam";
      $user->flag = "^^!!!!!!!!!!";
    } else {
      $user->user_id = "Null";
      $user->name = "Null";
      $user->flag = "Null";
    }

  } else {
    header('Location:index.php');
  }
} catch (\Exception $e) { 
  echo $e; 
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

    <title>Who am I.</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
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
              <a class="nav-link"><?php echo $user->name; ?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link">(UserID : <?php echo $user->user_id; ?>)</a>
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
      <h1 class="mt-5"><?php echo $user->flag; ?></h1>
      <p class="lead">Has ridens iriure et. Euismod veritus nam ea, eu pri stet utinam tritani. Sea petentium dissentiet ei, nam dico petentium an. Audire ornatus petentium pri ad, cu pro voluptua deseruisse. Wisi veniam cu duo. Duis vivendum sea eu. Virtute discere ex duo, per cu graece labores, sit ei brute option.</p>
      <p>Vim duis liber ex, cum ea aliquid legendos. Sumo dolor vocibus ut per. </p>
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">
        <?php if($user->user_id !== "000") { ?>
          <p>You are not an admin ;P</p>
        <?php } ?>
        </span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery-3.3.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="jquery-slim.min.js"><\/script>')</script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
  </body>
</html>
