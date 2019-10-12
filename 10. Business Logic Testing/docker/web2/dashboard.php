<?php
    include_once('connectdb.php');
    session_start();
    if( !isset($_SESSION["user"]) ){
        header("location:index.php");
        exit;
    }
	$user = json_decode($_SESSION["user"]);
?>

<?php include "header.php"; ?>
<div class="row">
	<div class="col-sm-12">
		<h3 style="padding-top: 30px;">Dashboard</h3>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 col-lg-9 offset-lg-0">
		<div class="embed-responsive embed-responsive-21by9 card">
			<iframe class="embed-responsive-item" src="albumlist.php"></iframe>
		</div>
	</div>
	<div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 col-lg-3 offset-lg-0">
		<div class="form-group alert alert-secondary">
<?php
			echo "Username: <strong>" . htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8') . "</strong><br>";
			echo "Email: <strong>" . htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') . "</strong><br><br>";
?>			
			<a href="logout.php" class="form-control btn btn-danger" >Logout</a>
		</div>
		<div class="form-group alert alert-secondary">
			<form method="POST" action="upload.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Select Picture</label>
					<input type="file" class="form-control-file" name="fileToUpload">
				</div>
				<div class="form-group">
					<input type="submit" class="form-control btn btn-primary" value="Upload">
				</div>
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>