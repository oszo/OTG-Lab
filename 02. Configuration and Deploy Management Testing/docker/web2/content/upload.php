<?php

if ($_SESSION['username'] != "admin")
{
  header("Location: index.php");
}

if (CHKACCESS === "DIRECT")
{

  $file_tmp =$_FILES['fileToUpload']['tmp_name'];
  $file_type=$_FILES['fileToUpload']['type'];
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 0;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if (($file_type !== "image/jpg") and ($file_type !== "image/jpeg"))
    {
      $check = false;
    }
    if ($imageFileType === "php")
    {
      $check = false;
    }
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ". Check uploaded file in \"List Image\" menu.";
      $uploadOk = 1;
    } else {
      echo "File is not a JPG image.";
      $uploadOk = 0;
    }
  }

  if ($uploadOk === 1)
  {
    move_uploaded_file($file_tmp,$target_file);
  }

?>

<form action="index.php?page=upload.php" method="post" enctype="multipart/form-data">
    Select image to upload (Only JPG is allowed): <br><br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php

}
else {
  echo "<script language=\"javascript\">alert(\"Please login\");document.location.href='login.php';</script>";
}

 ?>
