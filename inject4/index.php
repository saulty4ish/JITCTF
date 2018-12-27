<html>
<head> 
<meta charset="utf-8" /> 
<title>sql注入测试</title> 
<style> 
body{text-align:center} 
</style> 
</head> 
<body > 

<br />
<?php
	include("config.php");
	$id=@$_GET['id'];
	// echo $id;
	$id = str_replace(' ', '', $id);
	// echo $id;
	if($id==null){
		$id="1";
	}
	mysql_query('set names utf8');
	$sql = "SELECT * FROM user WHERE id='$id'";//定义sql语句并组合变量id  
	// echo $sql;
	$result = mysql_query($sql); 
	if(!$result)
    {
        die('<p>error:'.mysql_error().'</p>');
    }
	echo "<font size='10' face='Times'>sql注入测试</font></br>";
	echo "<table border='2'  align=\"center\">";
	echo "<tr><td>id</td>";
	echo "<td>用户名</td>";
	echo "<td>密码</td>";
	echo "</tr>";
	//遍历查询结果
     while ($row = mysql_fetch_array($result))
	{
	if (!$row){
		echo "该记录不存在";
		exit;
	}
			echo "<tr>";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[6]."</td>";
			echo "</tr>";
	}
	echo "<td  colspan=\"3\" >sql语句:&nbsp;>".$sql."</td>";
	echo "</table>";
	?>
</body> 
</html> 