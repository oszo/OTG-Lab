<?php
    include_once('connectdb.php');
    session_start();
    if( isset($_SESSION["user"]) ){
        header("location:dashboard.php");
    }
?>
<?php include "header.php"; ?>
<div class="row">
	<div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 col-lg-4 offset-lg-4">
	<h3 style="padding-top: 30px;">Login</h3>
	<form method=POST action=login.php>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="usr" autocomplete="off" placeholder="Enter username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="pwd" autocomplete="off" placeholder="Password">
		</div>
		<div class="form-group">
<?php if( isset($_GET['status']) && strlen($_GET['status'])>0 ){ ?>
			<div class="form-control alert alert-danger" role="alert">
				Username or Password is incorrect.
			</div>
<?php } ?>
			<input type="submit" value="sign in" class="form-control btn btn-primary">
		</div>
		<div class="form-group">
			<a href="register.php" class="form-control btn btn-secondary" >Register</a>
		</div>
	</form>
	</div>
</div>
<?php include "footer.php"; ?>