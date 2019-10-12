<?php
    $conn = new mysqli("otg_buslogic_db2","admin","DbS0meSecPa55w0rd","AlbumSite");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>