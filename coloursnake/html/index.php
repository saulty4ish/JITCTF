<?php
session_start();
//session_destroy();

$_SESSION['score'] = 0;
$_SESSION['lasttime'] = time();

//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
 	<meta name="viewport" id="viewposrtMeta" content="width=640, user-scalable=no, maximum-scale=1, target-densitydpi=device-dpi">
 	<meta content="telephone=no" name="format-detection">
 	<meta name="apple-touch-fullscreen" content="yes">
 	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
 	<title>JSnake game</title>
 	<link rel="stylesheet" type="text/css" href="index.css?v=0.2.1">
 	
 </head>
 <body>
 	<div id="view-area">
 		<div class="pageProp" id="propBox">
			<h1><b>炫彩贪吃蛇</b> 得分 <span id="score">0.0</span></h1>
			<h3 style="text-align:center">请使用最新版Chrome玩耍</h3>
 			<div id="game-area">
				<?php for($i=1;$i<=80*40;$i++){ 
				//$way = '';
				//if($i<=33) $way.= 'border-top:1px solid 444;';
				//if($i%33==1) $way.= 'border-left:1px solid 444;';
				//if($i%33==0) $way.= 'border-right:1px solid 444;';
				//if($i>1056) $way.= 'border-bottom:1px solid 444;';

				?>
				<div class="pix" ></div>
				<?php } ?>
 			</div>
 			<div id="operate">
 				<button id="startButton">从头开始</button>
 				<button id="parseButton">暂停/继续</button>
 			</div>
 			<div class="tips">
 				<h3>游戏说明：</h3>
 				<p>OTF为您打造加长版炫彩贪吃蛇</p>
 				<p>回车键开始 、空格暂停 、方向键控制方向</p>
 				<p>按一下键就加一个，吃到一个加一截。。</p>
 				<p>得到50分获得flag</p>
 				
 			</div>
 		</div>
 	</div>
 	<script type="text/javascript" src="game.js"></script>
</body>
</html>