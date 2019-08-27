<?php

//单例模式
class site{
    //属性
	public $siteName;
	//本类的静态实例
	protected static $instance= null;
	//禁用掉构造器 构造方法私有化（禁止类外部用new的方式实例化类）
	private function __construct($siteName){
		$this->siteName = $siteName;

	}
    //获取本类唯一实例
    public static function getInstance($siteName="hello"){

    	if(!self::$instance instanceof self){
    		self::$instance = new self($siteName);
    		echo "11111";
    	}
    	echo "222222";
    	return self::$instance;
    	

    }

}

//工厂模式  用工厂模式生成本类的单一实例
// 1.注册 set() 吧对象挂到树上
//2.获取：get()取出对象；
// 3 注销对象 _unset();
class factory {

    public static function create(){
    	return site::getInstance();
    }
	
}

//对象注册树

class register {
    //创建对象池： 数组
    protected static $objects =[];
    public static function set($alias,$object){
    	self::$objects[$alias]=$object;
    }
    public static function get($alias){
    	return self::$objects[$alias];
    }

    public static function _unset($alias){
	unset (self::$objects[$alias]);
    }
}

//把site放在对象池

register::set('sit',factory::create());
register::set('sit2',factory::create());
$sit=register::get("sit");
$sit2=register::get("sit2");
//var_dump($sit);
//echo "</br>";
//var_dump($sit->siteName);

?>