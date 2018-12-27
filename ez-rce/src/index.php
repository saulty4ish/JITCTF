<?php 
require_once('flag.php'); 
error_reporting(0); 

if(!isset($_GET['u'])){ 
    highlight_file(__FILE__); 
    die(); 
}else{ 
    $i=$_GET['i']; 
    $u=$_GET['u']; 
    if($_GET['u']!="Hello World"){ 
        die('die...'); 
    } 
    assert("$i == $u"); 
    // TODO 
    // echo $flag;  
} 
?>