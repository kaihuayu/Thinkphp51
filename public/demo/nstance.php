<?php
//ThinkPHP5 instance的实现

class TestClass {
 
    public static function instance() {
        return new self();
    }
 
    public $data = [];
 
    public function __set($name, $val) {
        return $this->data[$name] = $val;
    }
 
    public function __get($name) {
        return $this->data[$name];
    }
}
 
$app1 = TestClass::instance();
//$app1 = new TestClass();
$app1->k = 'Application 1';
echo $app1->k . '<br />';
?>