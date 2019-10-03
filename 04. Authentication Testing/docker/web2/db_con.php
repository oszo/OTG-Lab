<?php
$hostname = "otg_authn_db2";
$username = "root";
$password = "S3cretP@ssw0rd";
$database = "login";

$dbh = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
?>
