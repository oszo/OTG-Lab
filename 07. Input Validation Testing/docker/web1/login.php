<?php
session_set_cookie_params(3600,"/");
session_start();
if( isset($_SESSION["user7l1"]) ){
    header("location:home.php");
    exit;
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inputUsername']) && isset($_POST['inputPassword']) ) {

    $user_status = false;
    $users = array("guest"); 
    foreach ($users as $user) {
        if ( $user === $_POST['inputUsername'] ){
            $user_status = true;
        }
    }

    if ( $user_status == true && $_POST['inputPassword']=="guest" ){
        $user = new \stdClass();
        $user->id = "8";
        $userJSON = json_encode($user);
        $_SESSION["user"] = $userJSON;
        $cookie_name = "userProfileId";
        $cookie_value = base64_encode("8");
        setcookie($cookie_name, $cookie_value);
        header('Location:home.php');
        exit;
    }
}
session_unset();
session_destroy();
header('Location:index.php');
?>