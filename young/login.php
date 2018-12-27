<?php
require "./config.php";
session_start();
function login($username, $password){
    if ( $username && $password){
        $sql = "select password from users where username='{$username}' and password='{$password}'";
        $result=mysqli_query($GLOBALS['con'],$sql);
        $banner=mysqli_num_rows($result);
        if($banner){
            $_SESSION['is_admin'] = 1;
            $url = "location:./config.php";
            header($url);
        }
        else
            echo "<script>alert(\"Username or Password is wrong!\");window.location=\"./index.php\";</script>";
    }
    else{
        echo "<script>alert(\"Username or Password cant be NULL!\");window.location=\"./index.php\";</script>";
    }


}

$username = isset($_POST['username'])? addslashes(trim($_POST['username'])) : NULL;
$password = isset($_POST['password'])? addslashes(md5(trim($_POST['password']))) : NULL;

login($username,$password);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>

</body>
