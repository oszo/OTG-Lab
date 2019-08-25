<?php 
$hostname = "otg_config_db1";
$username = "root";
$password = "S3cretP@ssw0rd";
$database = "login";

$dbh = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
?>
