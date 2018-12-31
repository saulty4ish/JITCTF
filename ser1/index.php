<?php 
class SoFun{ 
  protected $file='index.php';
  function __destruct(){ 
    if(!empty($this->file)) {
      if(strchr($this-> file,"\\")===false &&  strchr($this->file, '/')===false)
        show_source(dirname (__FILE__).'/'.$this ->file);
      else
        die('Wrong filename.');
    }
  }  
  function __wakeup(){
   $this-> file='index.php';
  } 
  public function __toString(){
    return '' ;
  }
}     
if (!isset($_GET['file'])){ 
  show_source('index.php');
}
else{ 
  $file=base64_decode($_GET['file']); 
  echo unserialize($file); }
 ?> 
 <!--key in flag.php-->

