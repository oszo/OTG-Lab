<?php
include "db_con.php";
session_set_cookie_params(3600,"/");
session_start();
if( isset($_SESSION["user4l2"]) ){
    header("location:home.php");
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inputUsername']) && isset($_POST['inputPassword']) ) {
    if ( $_POST['inputUsername'] === "guest" && $_POST['inputPassword'] === "guest" ){
        $user = new \stdClass();
        $user->id = "8";
        $userJSON = json_encode($user);
        $_SESSION["user4l2"] = $userJSON;
        header('Location:home.php');
        exit;
    }

    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];
    
    try {
        $sth = $dbh->prepare("SELECT password FROM tbl_users WHERE username=? limit 0,1");
        $sth->execute(array(md5($username)));
        $result = [];
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        if(!$result) {
            header('Location:index.php?error=Username%20does%20not%20exist');
            exit;
        };
        if (md5($password."0dY/9xVQS[R\\\"Sq}UekBjAkY1)9_Qz4_") == $result[0]['password'])
        {
            $_SESSION['user4l2'] = $username;
            $_SESSION['pass4l2'] = $password;
            echo "<script language=\"javascript\">alert(\"welcome\");document.location.href='index.php';</script>";
        }else{
            header('Location:index.php?error=Invalid%20password');
            exit;
        }
    } catch (PDOException $e) {
        log_error("Failed to select user", $e->getMessage(), $e->getCode(), array('exception' => $e));
        session_unset();
        session_destroy();
        header('Location:index.php');
    }    
} else {
    session_unset();
    session_destroy();
    header('Location:index.php');
}
?>