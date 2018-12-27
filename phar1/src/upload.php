<!DOCTYPE html>
<html>
<head>
	<title>请上传文件</title>
</head>
<body>
<form method="post" action="upload.php" enctype="multipart/form-data">
	<input type="file" name="image">
	<input type="submit" name="submit">
</form>
</body>
</html>

<?php
    $error = "";
    $exts = array("jpg","png","gif","jpeg");
    if(!empty($_FILES["image"]))
    {
        $temp = explode(".", $_FILES["image"]["name"]);
        $extension = end($temp);
        if((@$_upfileS["image"]["size"] < 102400))
        {
            if(in_array($extension,$exts)){
              $path = "uploads/".md5($temp[0].time()).".".$extension;
              move_uploaded_file($_FILES["image"]["tmp_name"], $path);
              $error = "上传成功!";
            }
        else{
            $error = "上传失败！";
        }

        }else{
          $error = "文件过大，上传失败！";
        }
        echo $error;
    }

?>