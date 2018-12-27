<?php
  if(isset($_POST['username'])&&isset($_POST['password'])){
    header("Location: index.php?page=upload");
    exit();
  }
?>