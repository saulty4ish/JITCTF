<?php
require './config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>请以管理员身份登录</title>
</head>

<body>
	<p class="tip">请以管理员身份登录</p>
	<div class="cont">
		<div class="form sign-in">
			<form action="login.php" method="post">
				<h2>只有管理员才能进来</h2>
				<label>
					<span>Usernmae</span>
					<input type="text" name="username"/>
				</label>
				<label>
					<span>Password</span>
					<input type="password" name="password"/>
				</label>
				<button type="submit" class="submit">Sign In</button>
			</form>
			
		</div>
		
	<script src="js/index.js"></script>
</body>
</html>