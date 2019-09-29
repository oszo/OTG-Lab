<?php
    session_set_cookie_params(3600,"/");
    session_start();
    if( !isset($_SESSION["user3l1"]) ){
        echo "Hay, you are not admin. You cannot GET this page.";
    } else {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['function']) && strlen($_POST['function'])>0 ){
            function dd( $string, $action = 'e' ) {
                $secret_key = $_POST['function'];
                $secret_iv = 's3cret_iv';
                $output = false;
                $encrypt_method = "AES-256-CBC";
                $key = hash( 'sha256', $secret_key );
                $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
                if( $action == 'e' ) {
                  $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
                }
                else if( $action == 'd' ){
                  $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
                }
                return $output;
            }
            $fn = $_POST['function'];
            $data = new \stdClass();
            header('Content-Type: application/json');
            if ( $fn === "testCallAdminFunction" ){
                $data->fn = "testCallAdminFunction";
                $data->status = "success";
                $dataJSON = json_encode($data);
                echo $dataJSON;
            } elseif ( $fn === "loginAdmin" ){
                $data->fn = "loginAdmin";
                if( isset($_POST['username']) && isset($_POST['password']) ){
                    $data->msg = "Username or password incorrect.";
                } else {
                    $data->msg = "Username and password is required.";
                }
                $data->status = "false";
                $dataJSON = json_encode($data);
                echo $dataJSON;
            } elseif ( $fn === "addUser" ){
                $data->fn = "addUser";
                if( isset($_POST['username']) && strlen($_POST['username'])>0 && isset($_POST['password']) && strlen($_POST['password'])>0 && isset($_POST['name']) && strlen($_POST['name'])>0 && isset($_POST['sname']) && strlen($_POST['sname'])>0 && isset($_POST['email']) && strlen($_POST['email'])>0 && isset($_POST['role']) && strlen($_POST['role'])>0 ){
                    if ($_POST['role']==="999"){
                        $data->msg = "Flag is ".dd("VTJvZFpILzlFeWVYeWlZd1dzd1dRV2tKSHJqK1R0a2FaeGZmbDNhWjBLeFEzMUZSMHJBeTlLS2ZSZXdWVjFQNA==", 'd');
                    } else {
                        $data->msg = "Add success, but you cannot use that account. Please wait for admin approve.";
                    }
                    $data->status = "success";
                } else {
                    $data->msg = "Incomplete input, please check add user input!";
                    $data->status = "false";
                }
                $dataJSON = json_encode($data);
                echo $dataJSON;
            } else {
                $data->fn = "Not found.";
                $data->status = "false";
                $dataJSON = json_encode($data);
                echo $dataJSON;
            }
        } else {
            echo "Error, 'function' is required.";
        }
    }

?>