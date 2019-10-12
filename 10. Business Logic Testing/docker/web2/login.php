<?php
    include_once('connectdb.php');
    session_start();
    if( isset($_SESSION["user"]) ){
        header("location:dashboard.php");
    } else {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usr']) && isset($_POST['pwd']) && strlen($_POST['usr'])>0 && strlen($_POST['pwd'])>0 ) {

            $usr = $_POST['usr'];
            $pwd = $_POST['pwd'];
            $stmt = $conn->prepare("SELECT id,username,email FROM user WHERE username=? and password=?");
            $stmt->bind_param("ss", $usr, $pwd);
            $stmt->execute();
            $stmt->bind_result($user->id, $user->username, $user->email);
            $stmt->fetch();
//echo $user->id . "\n";
//echo $user->email . "\n";
            if ( $user->id!="0" ){
                $userJSON = json_encode($user);
                $_SESSION["user"] = $userJSON;
                header('Location:dashboard.php');
                exit;
            }
            
        }
    }
    header('Location:index.php?status=false');
?>
