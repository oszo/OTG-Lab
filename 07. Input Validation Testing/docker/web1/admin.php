<?php
session_set_cookie_params(3600,"/");
session_start();
if( !isset($_SESSION["user7l1"]) ){
    header("location:admin-login.php");
}

$conn = new mysqli("otg_inpval_db1","root","S3cretP@ssw0rd3","acc_manage_site");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "";
if( isset($_COOKIE['userProfileId']) ) {
    $sql = "SELECT id, username, email, status FROM user where id='" . base64_decode($_COOKIE['userProfileId']) . "'";
} else {
    $sql = "SELECT id, username, email, status FROM user where id='8'";
}
$result = $conn->query($sql);

$user = new \stdClass();
$user->id = "";
$user->username = "";
$render_profile = '';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->id = $user->id . $row["id"] . " ";
        $user->username = $user->username . $row["username"] . " ";
        $render_profile = $render_profile . '<p class="lead">';
        $render_profile = $render_profile . '<div class="row"><div class="col-4 text-right">ID:</div><div class="col-8 text-left">' . $row["id"] . '</div></div>';
        $render_profile = $render_profile . '<div class="row"><div class="col-4 text-right">Username:</div><div class="col-8 text-left">' . $row["username"] . '</div></div>';
        $render_profile = $render_profile . '<div class="row"><div class="col-4 text-right">Email:</div><div class="col-8 text-left">' . $row["email"] . '</div></div>';
        $render_profile = $render_profile . '<div class="row"><div class="col-4 text-right">Status:</div><div class="col-8 text-left">' . $row["status"] . '</div></div>';
        $render_profile = $render_profile . '</p>';
    }
} else {
    $render_profile = $render_profile . '<p class="lead">';
    $render_profile = $render_profile . "0 results";
    $render_profile = $render_profile . '</p>';
}
$conn->close();
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
              <a class="nav-link"><?php echo $user->name; ?> <span class="sr-only">(current)</span></a>
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
      <p class="lead">Are you satisfied, only have access to the admin page?</p>
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