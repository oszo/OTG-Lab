<?php
$hostname = "otg_authz_db1";
$username = "root";
$password = "S3cretP@ssw0rd2";
$database = "file_share";

$dbh = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
?>
