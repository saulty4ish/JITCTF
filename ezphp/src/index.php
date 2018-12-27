<?php
$filename = 'flag.txt';
$flag = 'flag.txt';
extract($_GET);

if(isset($sign)){
    $file = trim(file_get_contents($filename));
    if($sign === $file){
        echo 'Congratulation!<br>';
        echo file_get_contents($$falg);
    }
    else{
        echo 'don`t give up';
    }
}
else{
	highlight_file("./index.php");
}