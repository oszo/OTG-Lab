<?php
    $conn = new mysqli("localhost","admin","DbS0mePa55w0rd","AlbumSite");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>