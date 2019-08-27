<?php 
/* 依赖注入
1.任何的URL访问都是定位到控制器的，有控制器中摸个具体方法去执行
2.一个控制器对应着一个类，如果这些类需要要同一管理，怎么办，用容器进行类管理，控制器是用户直接访问的。
容器还可以将类的实例（对象）作为参数，传递给方法，这时会自动触发依赖注入。
3.依赖注入：将对象类型的数据，以参数的方式传递到方法的参数列表；
4.URL访问：通过GET方式将数据传到控制器指定的方法中.只能传递字符串，数值，无法传递对象，
5.依赖注入解决了向类中的方法传对象的问题。


*/
namespace app\index\controller;
class Rely {
	//通GET 方法传值
    public function getname($name = "pate"){
    	return "hello " .$name;
    }


    //依赖注入
    public function	 getMethot(\app\common\Temp $Temp){
     
       // \app\common\Temp $temp 等价于 $Temp = new \app\common\Temp;
    	//$Temp = new \app\common\Temp;
    	 $Temp -> SetName("注入啦啦");
        return $Temp -> getName();
    	
    }

    //绑定一个类到容器中
    public function bindclass(){
    	//把一个类放到容器中：相当于注册到容器中
    	\think\Container::set('temp','\app\common\Temp');
    	//bind('temp','\app\common\Temp');  //bind 助手函数
    	//将容器中的类实例化并取出来用：实例化时同调用构造器进行初始化
        $temp = \think\container::get('temp',['name'=>'初始化']);
    	//$temp = app('temp',['name'=>"app助手函数"]);

    	return $temp->getName();

    }

    //绑定一个闭包到容器：闭包可以理解为匿名函数
    public function bindClosure(){
        //将以哥闭包放到容器中
        \think\Container::set('demo',function($name){
            return '闭包可以理解为什么'.$name;
        });
      //理解为匿名函数 demo=function（）{
           // return '闭包可以理解为什么'.$name;
        //}

        $temp = \think\container::get('demo',['name'=>'匿名函数']);
        return $temp;
    }


}



?>