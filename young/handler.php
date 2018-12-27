<?php
require "./config.php";

function generatePasswd(){
    mt_srand((double) microtime() * 1000000);
    var_dump(mt_rand());
    return substr(md5(mt_rand()),0,6);
}

function changePasswd($username, $password){
    $password = md5($password);
    $sql = "update users set password='{$password}' where username='{$username}'";
    if (mysqli_query($GLOBALS['con'],$sql)) {
        echo "<script>alert(\"Success!\");";
    } else {
       echo "<script>alert(\"Error!\");history.back(-1);</script>";
    }
    //关闭连接
}

$username = isset($_POST['username']) ? addslashes(trim($_POST['username'])) : highlight_file("handler.php");
$passwd = generatePasswd();
changePasswd($username,$passwd);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Asuri-Team Managment System</title>
</head>
<body>

</body>
