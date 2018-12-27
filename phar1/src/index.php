<?php
  if(isset($_GET['page'])){
    if(!stristr($_GET['page'],"..")){
      $page = $_GET['page'].".php";
      include($page);
    }else{
      header("Location: index.php?page=login");
    }
  }else{
    header("Location: index.php?page=login");
  }
?>