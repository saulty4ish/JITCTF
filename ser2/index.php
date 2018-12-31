<?php 
class cls1{ 
    var $cls; 
    var $arr; 

    function show(){ 
        show_source(__FILE__); 
    } 

    function __wakeup(){ 
        foreach($this->arr as $k => $v){ 
            echo $this->cls->$v; 
        } 

    } 
} 

class cls2{ 
    var $filename = 'hello.php'; 
    var $txt = ''; 
    function __get($key){ 
        if($key == 'fileput'){ 
            return $this->fileput(); 
        }else{ 
            return '<p>'.htmlspecialchars($key).'</p>'; 
        } 
    } 

    function fileput(){ 
        if(    strpos($this->filename,'../') !== false || 
            strpos($this->filename,'\\') !== false      
        ) die(); 

        $content = '<?php die(\'stupid\'); ?>'; 
        $content .= $this->txt; 
        file_put_contents($this->filename, $content); 
        return htmlspecialchars($content); 

    } 

} 

if(!empty($_POST)){ 
    $cls = base64_decode($_POST['ser']); 
    $instance = unserialize($cls); 
}else{ 
    $a = new cls1(); 
    $a->show(); 
} 