<?php
/*静态代理*/

namespace app\index\controller;
use app\facade\Test;

class Demo2
{
   public function index(){
      // $test =new \app\common\Test();
      // return $test -> hello("what is faced");  //对象的方式调用
       /*如果想静态的调用一个动态的方法，需要给当前的类绑定一个静态的代理 FACEDE
       如果没有在静态代理类中显示指定要绑定的类名，就需要动态绑定一下
       \think\Facade::bind()
       */

       \think\Facade::bind("app\Facade\Test",'app\common\Test'); //动态方法绑定
      return Test::hello("代理成功啦");
   }
}