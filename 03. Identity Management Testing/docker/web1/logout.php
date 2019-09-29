<?php
    session_set_cookie_params(3600,"/");
    session_start();
    session_unset();
    session_destroy();
    header('Location:index.php');
?>