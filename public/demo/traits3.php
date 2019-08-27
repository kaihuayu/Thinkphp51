<?php 
/*trait优先级问题
1.当前类中的方法与trait类，父类中的方法重名了怎么调用
2.trait类的优先级是高于同名父类的
3.当多个triat类中有同名方法怎么办
*/
 
trait Demo1{

	public function hello(){
		return __METHOD__;
	}
}


trait Demo2{

	public function hello(){
		return __METHOD__;
	}
}

class Test{

 	public function hello(){
        return __METHOD__ ; //返回方法名
 	}

}

Class Demo extends Test{
    use Demo1,Demo2{

    	Demo1::hello insteadof Demo2;//用demo1中的hello替代demo2
    	Demo2::hello  as hello22; //给demo2中hello 起个别名
    }//声明 相当于把 demo1 和 demo2 的方法复制到本类中了

 	/*public function hello(){
        return __METHOD__ ; //返回方法名 
 	}*/

 	public function test(){

 		return $this->hello1(); // 直接this 调用

 	}
 	 	public function test2(){
 	
 		return $this->hello2(); // 直接this 调用
 	}
 }

 $obj= new Demo;
 echo $obj->hello(); 
  echo "<hr>";
 echo $obj->hello22(); 
/* echo "<hr>";
 echo $obj->hello1();
  echo "<hr>";
 echo $obj->test2();*/

?>