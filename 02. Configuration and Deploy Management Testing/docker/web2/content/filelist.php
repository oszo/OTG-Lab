<?php

if ($_SESSION['username'] != "admin")
{
  header("Location: index.php");
}

if (CHKACCESS === "DIRECT")
{
  $path = "./images/";
  $entries = scandir($path);
  $filelist = array();
  foreach($entries as $entry) {
    if (is_dir($entry)) continue;
    $filelist[] = $entry;
    echo "<a href='./images/" . $entry . "'>" . $entry . "</a><br>";
  }
}
else {
  echo "<script language=\"javascript\">alert(\"Please login\");document.location.href='login.php';</script>";
}
?>
