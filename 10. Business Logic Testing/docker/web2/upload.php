<?php include "header.php"; ?>

<div class="row">
	<div class="col-sm-12"><br><br>
    Status:<br>
<?php

	include_once('connectdb.php');
	session_start();
	if( !isset($_SESSION["user"]) ){
		header("location:index.php");
		exit;
	}

    $target_dir = "uploads/";
    $img_name = hash('sha256', $_FILES["fileToUpload"]["name"] . rand(100000,999999));
    $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
    $target_file = $target_dir . $img_name . "." . $imageFileType;
    $uploadOk = 1;
    

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {

        $sql = "INSERT INTO upload (filename) VALUES ('" . $target_file . "')";

        if ($conn->query($sql) === TRUE) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded <br>";
                echo "Rename the file to '" . substr($img_name,0,10) . "XXXXXXXXXX." . $imageFileType . "' for security reason.<br>";
                echo "Insert new file name to database";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

		<br>
		<a href="dashboard.php" class="btn btn-danger" >Back</a>
	</div>
</div>
<?php include "footer.php"; ?>