<?php
ini_set('display_errors','Off');
$flag="JITCTF{too_young}";
$con =new MySQLi("localhost","root","","young");
session_start();
if($_SESSION['is_admin'])
{
	echo $flag;
}
?>
