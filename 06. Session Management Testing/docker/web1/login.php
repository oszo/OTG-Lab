<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ( $_POST['inputUsername'] === "guest" && $_POST['inputPassword'] === "guest" ){
            $userJWT = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC92dWxuLWNvbXBhbnkubmV0IiwiYXVkIjoiaHR0cDpcL1wvdnVsbi1jb21wYW55Lm5ldCIsImlhdCI6MTU3MDQxODQzMCwidXNlcl9pZCI6IjAwOCJ9.WbISSxmzUis4SuzfrneA5b9J0MFfWtZbh_iK0Z2v_XU";
            header('Location:home.php?usertoken='.$userJWT);
            exit;
        }
    }
    header('Location:index.php');
?>