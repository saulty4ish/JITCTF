<html>
<head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8"/>
	<title>Login Page</title>
</head>
<body>
<h1>User Login</h1>
	<form action="" method="post">
		Username:<input type="text" name="username"/></br>
		Password:<input type="text" name="password"/></br>
		<input type="submit" value="Submit" name="submit"/>&nbsp&nbsp<input type="reset" value="Reset"/>
	</form>
<!-- 
if(isset($_POST['submit'])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$sql = "SELECT * from user where username='$username'";
	$result = mysql_fetch_assoc(mysql_query($sql));
	if(!empty($result)){
		if( $result['password'] === $password ){
			echo "<script>alert('登陆成功');</script>";
			echo "<p>欢迎您，".$result['username']."！！！</p>";
		}else{
			echo "<script>alert('密码错误');</script>";
		}
	}else{
		echo "<script>alert('用户名错误');</script>";
	}
}
 -->
</body>
</html>

<?php
include("config.php");
//正文
if(isset($_POST['submit'])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$sql = "SELECT * from user3 where username='$username'";
	$result = mysql_fetch_assoc(mysql_query($sql));
	if(!empty($result)){
		if( $result['password'] === $password ){
			echo "<script>alert('登陆成功');</script>";
			echo "<p>欢迎您，".$result['username']."！！！</p>";
		}else{
			echo "<script>alert('密码错误');</script>";
			// die();
		}
	}else{
		echo "<script>alert('用户名错误');</script>";
		// die();
	}
}
?>
