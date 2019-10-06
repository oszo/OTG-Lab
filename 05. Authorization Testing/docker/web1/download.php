<?php
    session_set_cookie_params(3600,"/");
    session_start();
    include "db_con.php";
    if( !isset($_SESSION["user5l1"]) ){
        header("location:login.php");
        exit;
    } else {

        try {
            $file = $_GET['file'];

            $sth = $dbh->prepare("SELECT * FROM tbl_files WHERE file_id=? limit 0,1");
            $sth->execute(array($file));
            $result = [];
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }

            $file_to_download = $result[0]['file_path']; // file to be downloaded
            
            header("Expires: 0");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");  header("Content-type: application/file");
            header('Content-length: '.filesize($file_to_download));
            header('Content-disposition: attachment; filename='.basename($file_to_download));
            readfile($file_to_download);

        } catch (PDOException $e) {
            log("Failed to select user", $e->getMessage(), $e->getCode(), array('exception' => $e));
        }   
        exit;
    }
?>