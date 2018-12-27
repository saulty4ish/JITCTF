<meta charset='UTF-8'>
    <title>瞌睡虫flag售卖中心</title>
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/index.css">
    <body>
    	<div class='starter_form1'>
<h1>瞌睡虫flag售卖中心</h1>
<?php 
ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_DEPRECATED);
$db = new mysqli("127.0.0.1","user1","123456", shop);

$sql = "SELECT rest FROM account";

$rest = intval($db->query($sql)->fetch_assoc()['rest']);

$sql = "SELECT own FROM account";

$own = intval($db->query($sql)->fetch_assoc()['own']);

echo "
<div class=\"starter_form\" style=\"align-content: center\">
<form action='' method='post'>

    <h3>您当前的余额：{$rest}元</h1>
    <div style=\"margin: 50px\">
             </div>


    支付<input type='text' name='money'>元买flag<br>
    </br>
    <div class='form-group'>
    <button class=\"btn btn-primary btn-block\" type=\"submit\" name='submit'>购买</button>
            </div>
             <div style=\"margin: 100px\">
             </div>
    已支付{$own}元，可是听说flag最低要21元...
    </br>
    <form action='' method='post'>
<button class=\"btn btn-primary btn-block\" type=\"submit\" name='restart' value='1'>重置</button>
</div>
</form>
</div>
</div>
";

if ($_POST['money']){

    $money = intval($_POST['money']);
    if($money<0)
    {
    	echo "<script>alert('我们瞌睡虫做的都是小本生意...兄弟你这样我们会破产的...')</script>";
    	exit();
    }
    if($money <= $rest) {

        $sql = "UPDATE account SET rest=rest-".$money;

        $db->query($sql);

        $sql = "UPDATE account SET own=own+".$money;

        $db->query($sql);

        echo "<script>alert('支付成功');window.location.href=this.location.href</script>";

    } else {

        echo "<script>alert('支付失败，可能是因为您的余额不足。')</script>";

    }
    $sql="select own from account";
    $banner = intval($db->query($sql)->fetch_assoc()['own']);
   	if($own>=21)
   	{
   		echo "等等..无中生友，你怕不是...\nJITCTF{lubenweimeiyoukaigua}";
   	}
}
else if ($_POST['restart']==1){
	$sql = "UPDATE account SET rest=20";
	$db->query($sql);
	$sql = "UPDATE account SET own=0";
	$db->query($sql);
}
?>

</body>

</html>
