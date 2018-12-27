<?php
$db['host'] = 'localhost';
$db['port'] = '3306';
$db['username'] = 'inject';
$db['password'] = 'inject';
$db['database'] = 'inject';

@$link = mysqli_connect($db['host'], $db['username'], $db['password'],$db['database']);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

foreach ($_POST as $key => $value) {
	if(stripos($value, 'sleep')!==false || stripos($value, 'benchmark')!==false){
		die('不许使用这sleep,benchmark两个函数');
	}
}
?>
