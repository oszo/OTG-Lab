<?php
    session_set_cookie_params(3600,"/");
    session_start();
    if( !isset($_SESSION["user3l2"]) ){
        header("location:login.php");
    }

    function a( $string, $action = 'e' ) {
      // you may change these values to your own
      $secret_key = "";
      if( isset($_SESSION["pass"]) ){
        $secret_key = $_SESSION["pass"];
      }
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
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Vuln-Company</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link<?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="dashboard" ){echo ' active';}} ?>" href="index.php?page=dashboard">
                  <span data-feather="home"></span>
                  Dashboard 
                  <?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="dashboard" ){echo '<span class="sr-only">(current)</span>';}} ?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link<?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="orders" ){echo ' active';}} ?>" href="index.php?page=orders">
                  <span data-feather="file"></span>
                  Orders
                  <?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="orders" ){echo '<span class="sr-only">(current)</span>';}} ?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link<?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="products" ){echo ' active';}} ?>" href="index.php?page=products">
                  <span data-feather="shopping-cart"></span>
                  Products
                  <?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="products" ){echo '<span class="sr-only">(current)</span>';}} ?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link<?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="customers" ){echo ' active';}} ?>" href="index.php?page=customers">
                  <span data-feather="users"></span>
                  Customers
                  <?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="customers" ){echo '<span class="sr-only">(current)</span>';}} ?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link<?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="reports" ){echo ' active';}} ?>" href="index.php?page=reports">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                  <?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="reports" ){echo '<span class="sr-only">(current)</span>';}} ?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link<?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="integrations" ){echo ' active';}} ?>" href="index.php?page=integrations">
                  <span data-feather="layers"></span>
                  Integrations
                  <?php if( isset($_GET['page']) ){if ( strtolower($_GET['page'])==="integrations" ){echo '<span class="sr-only">(current)</span>';}} ?>
                </a>
              </li>
            </ul>

          </div>
        </nav>

<?php 
    if( isset($_GET['page']) ){
        try {
          include($_GET['page'].'.php');
        } catch(Exception $e) {
          echo "Error: Not found \"include('".$_GET['page'].".php');\" resource.";
        }
    }
?>

      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="js/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>
</html>
