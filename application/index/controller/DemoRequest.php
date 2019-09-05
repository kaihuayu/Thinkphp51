<?php


namespace app\index\controller;
use think\Request;
use think\Controller;
//use think\facade\Request; //导入请求对象的静态代理

class DemoRequest extends  \think\Controller
{
    public  function test(){
/* 正常情况下，控制器不依赖于父类Controller..php
推荐继承父类，可以很方便的使用在父类中封装好的一些方法和属性
Controller.php 没有静态代理
控制器中的输出，字符串全部用return 返回，不用ECHO
如果输出的格式是复杂类型，我们可以用dump()函数
默认输出的格式为html ,可以指定为其他格式：json
1.传统的 new Request
2.静态代理：think\facade\Request
3. 依赖注入：Request $request
4.父类Controller 中的属性 $request:$this->request
*/
        return "think php";
    }

    public function  requ()
    {
        //创建一个请求对象Request 的静态代理调用
     //  dump( Request::get());
        $re = new Request(); //传统调用
        dump($re->get());
    }

    public function  requy(Request $re)
    {
        //依赖注入的方式
        dump($re->get());
    }

    public function  requys()
    {
        //父类中的属性 方式访问
        dump($this->request->get());
    }

}