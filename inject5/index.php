<!DOCTYPE html>
<html>
<head>
	<title>学生登陆入口</title>
	<meta charset="utf-8" />
	<style type="text/css">
		#error{
			color: red;
		}
	</style>
</head>
<body>
	<form action="index.php" method="POST">
		<h1>学生登陆</h1>
		学号：<input name="username" type="text"></input><br>
		密码：<input name="password" type="text"></input><br>
		<input name="submit" type="submit"></input>
	</form>
	<p id="error">
<?php
if(isset($_POST['submit'])){

	function error_die($msg){
		echo $msg;
		die();
	}

	include '_config.php';
	$userLen = 8; 

	$username = $_POST['username'];
	$password = $_POST['password'];

	//var_dump(strpos($username," "));

	for ($i=0; $i < strlen($username); $i++) { 
		if($username[$i] === " " || $username[$i] === "'"){
			error_die("检测到危险输入");
		}
	}
	for ($i=0; $i < strlen($password); $i++) { 
		if($password[$i] === " " || $password[$i] === "'"){
			error_die("检测到危险输入");
		}
	}


	//var_dump(strlen($username));
	if(strlen($username) != $userLen){
		error_die("学号格式不正确");
	}

	$sql = "SELECT * from students 
	where username = '$username' and password = '$password'";

	$r = mysql_query($sql);
	if(!$r)
		error_die("sql语句炸了");

	$result = mysql_fetch_assoc($r);
	//var_dump($result);
	if($result == false){
		error_die("用户名或密码错误");
	}else{
		$name = $result['username'];
		$pass = $result['password'];
		if($name != 'admin'){
			error_die("登陆成功，你的用户名是".$name.",不过你只是个普通用户,管理员账号是admin");
		}else{
			error_die("登陆成功, 你的用户名是".$name.",您是超级用户，flag就是你的密码，你不会不知道吧。。");
		}
	}


}

?>
<!-- sql查询语句: -->
<!-- $sql = "SELECT * from students where username = '$username' and password = '$password'"; -->
</p>
</body>
</html>


