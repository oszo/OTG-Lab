<?php
session_set_cookie_params(3600,"/");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['score']) && isset($_POST['recommend'])) {
  $email = "";
  if (isset($_POST['email'])){
    $email = $_POST['email'];
  }


  $conn = new mysqli("otg_crypst_db1","root","S3cretP@ssw0rd3","acc_manage_site");
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  $stmt = $conn->prepare("INSERT INTO cust_survey (cus_name, cus_sname, cus_email, cus_score, recommend)
  VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $cus_name, $cus_sname, $cus_email, $cus_score, $recommend);

  $cus_name = $_POST['firstName'];
  $cus_sname = $_POST['lastName'];
  $cus_email = $email;
  $cus_score = $_POST['score'];
  $recommend = $_POST['recommend'];
  $stmt->execute();
  
  $conn->close();
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
    <h2>Customer Survey</h2>
    <p class="lead">Please leave a message to improve our service. Our administrator will review your recommendations shortly.</p>
  </div>

  <div class="row">
    <div class="col-md-12 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" novalidate method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
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

          <div class="col-md-6 mb-3">
            <label for="score">Satisfaction score</label>
            <select class="custom-select d-block w-100 bg-warning" id="score" name="score" required>
              <option value="">Choose...</option>
              <option>$</option>
              <option>$$</option>
              <option>$$$</option>
              <option>$$$$</option>
              <option>$$$$$</option>
            </select>
            <div class="invalid-feedback">
              Please select a satisfaction score.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="recommend">Recommendations</label>
          <input type="text" class="form-control" id="recommend" name="recommend" placeholder="Your recommendation" required>
          <div class="invalid-feedback">
            Please enter your recommendation.
          </div>
        </div>

        <br/>        
        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit a survey">
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'){ ?>
          <br/>
          <div class="mb-12">
            <div class="alert alert-success" role="alert">
              Thank You, we got your message.
            </div>
          </div>
        <?php } ?>        
      </form>
    </div>
  </div>

  <hr class="mb-4">
  <div class="row">
    <div class="col-md-12 order-md-1 bg-warning">
  <?php
  $conn = new mysqli("otg_crypst_db1","root","S3cretP@ssw0rd3","acc_manage_site");
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT id, cus_name, cus_sname, cus_email, cus_score, recommend FROM cust_survey";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
  ?>
    <div class="col-md-12 order-md-1">
      <br/>
      <h2>Recommendations :</h2>
    </div>
  <?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
  ?>

  <br/>
  <div class="card mb-12">
    <div class="row no-gutters">
      <div class="col-md-4">
        <svg class="bd-placeholder-img" width="100%" height="260" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#3b3e41;"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#e5e3df;"><?php echo($row["cus_score"]); ?></text></svg>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo($row["cus_name"]." ".$row["cus_sname"]); ?></h5>
          <p class="card-text"><?php echo($row["recommend"]); ?></p>
          <p class="card-text"><small class="text-muted">Email : <?php echo($row["cus_email"]); ?></small></p>
        </div>
      </div>
    </div>
  </div>

  <?php
    }
  ?>
  <br/>
  <?php
  } else {
    echo("No recomment");
  }
  $conn->close();
  ?>
</div></div>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2020 Vuln Company</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="admin-login.php">Admin Management</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/form-validation.js"></script>
<script>
$( document ).ready(function() {
  document.getElementById("firstName").onkeypress = function(e) {
    return /^[a-zA-Z0-9'?@()-.]+$/.test(String.fromCharCode(e.which));
  };
  document.getElementById("lastName").onkeypress = function(e) {
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