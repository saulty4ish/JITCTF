<?php
session_start();
//var_dump($_SESSION);

$result = array();

if(!isset($_SESSION['score'])){
	$result['state'] = 400;
	$result['msg'] = "炸了，请刷新游戏页面";
}else if(isset($_GET['reset'])){
	$result['state'] = 999;
	$result['msg'] = "reset";
}else{
	$timeGap = time() - $_SESSION['lasttime'];
	if($timeGap < 1){
		$result['state'] = 300;
		$result['msg'] = '那么快？作弊了吧';
	}else if($timeGap > 5){
		$result['state'] = 500;
		$result['msg'] = '这么久才吃到一个，零分！';
	}else{
		$result['state'] = 200;
		$result['msg'] = 'ok';
	}
}

//var_dump($result);

if($result['state'] == 200){
	$_SESSION['lasttime'] += $timeGap;
	$_SESSION['score'] += 1;
}else{
	$_SESSION['score'] = 0;
	$_SESSION['lasttime'] = time();
}

$result['score'] = $_SESSION['score'];
//var_dump($result);

if($_SESSION['score'] >= 50){
	$result['state'] = 1024;
	$result['msg'] = 'JITCTF{y0u_a4e_A_che4T_b0y}';
}

echo json_encode($result);


