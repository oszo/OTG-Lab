<?php

    session_set_cookie_params(3600,"/");
    session_start();
    if( !isset($_SESSION["user3l1"]) ){
        header("location:index.php");
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

    <title>Account Management System V3</title>

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
              <a class="nav-link">guest <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link">(UserID : 8)</a>
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
      <p class="lead">
        <div class="row">
          <div class="col-4 text-right">ID:</div>
          <div class="col-8 text-left">8</div>
        </div>
        <div class="row">
          <div class="col-4 text-right">Username:</div>
          <div class="col-8 text-left">guest</div>
        </div>
        <div class="row">
          <div class="col-4 text-right">Email:</div>
          <div class="col-8 text-left">guest@ezcompany.com</div>
        </div>
        <div class="row">
          <div class="col-4 text-right">Status:</div>
          <div class="col-8 text-left">active</div>
        </div>
      </p>
      <p class="lead"></p>
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

    <!-- V3 Admin function -->
    <script src="js/jquery.min.js"></script>
    <script>
      function testCallAdmin(){
        $.post("admin.php", 
          {
            function: "testCallAdminFunction"
          }, 
          function(data, status){
            return data;
          });
      }

      function loginAdmin(){
        $.post("admin.php", 
          {
            function: "loginAdmin",
            username: $("admin_username").val(),
            password: $("admin_password").val()
          }, 
          function(data, status){
            return data;
          });
      }

      function logoutAdmin(){
        $.post("admin.php", 
          {
            function: "logoutAdmin"
          }, 
          function(data, status){
            return data;
          });
      }

      function reloadAdminDashboard(){
        $.post("admin.php", 
          {
            function: "reloadAdminDashboard"
          }, 
          function(data, status){
            return data;
          });
      }

      function addUser(){
        $.post("admin.php", 
          {
            function: "addUser",
            username: $("add_form_username").val(),
            password: $("add_form_password").val(),
            name: $("add_form_name").val(),
            sname: $("add_form_sname").val(),
            email: $("add_form_email").val(),
            role: 0 /* 0=guest, 1=user, 999=admin */
          }, 
          function(data, status){
            return data;
          });
      }

      function updateUser(){
        $.post("admin.php", 
          {
            function: "updateUser",
            username: $("add_form_username").val(),
            password: $("add_form_password").val(),
            name: $("add_form_name").val(),
            sname: $("add_form_sname").val(),
            email: $("add_form_email").val(),
            role: 0 /* 0=guest, 1=user, 999=admin */
          }, 
          function(data, status){
            return data;
          });
      }

      function deleteUser(){
        $.post("admin.php", 
          {
            function: "deleteUser",
            username: $("add_form_username").val()
          }, 
          function(data, status){
            return data;
          });
      }
    </script>

  </body>
</html>
