<?php
    session_set_cookie_params(3600,"/");
    session_start();
    if( isset($_SESSION["user3l1"]) ){
        header("location:home.php");
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inputUsername']) && isset($_POST['inputPassword']) ) {
        if ( $_POST['inputUsername'] === "guest" && $_POST['inputPassword'] === "guest" ){
            $user = new \stdClass();
            $user->id = "8";
            $userJSON = json_encode($user);
            $_SESSION["user3l1"] = $userJSON;
            header('Location:home.php');
            exit;
        }
    } else {
        session_unset();
        session_destroy();
        header('Location:index.php');
    }
?>