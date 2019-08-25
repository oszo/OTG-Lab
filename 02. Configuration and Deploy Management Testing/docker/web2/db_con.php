<?php
$hostname = "otg_config_db2";
$username = "root";
$password = "S3cretP@ssw0rd2";
$database = "login";

mysql_connect($hostname,$username,$password) or die ("connection failed");
mysql_select_db($database) or die ("error connect database");
?>
