<?php
    session_start();
    if( !isset($_SESSION["user"]) ){
        header("location:login.php");
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
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">EZ-Company</a>
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

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted">
                <span data-feather="chevron-down"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="download.php?file=upload/201807.pdf" target="_blank">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="download.php?file=upload/201806.pdf" target="_blank">
                  <span data-feather="file-text"></span>
                  Last month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="download.php?file=upload/201805.pdf" target="_blank">
                  <span data-feather="file-text"></span>
                  Two month ago
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="download.php?file=upload/2017.pdf" target="_blank">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>

<?php 
    if( isset($_GET['page']) ){
        try {
	    $nullbyteindex = stripos($_GET['page'], "\0");
            if($nullbyteindex>0)
	    {
                include(substr($_GET['page'],0,$nullbyteindex));
	    }
	    else
	    {
                include($_GET['page'].'.php');
            }
        }
        catch(Exception $e) {
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
