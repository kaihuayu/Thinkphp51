<?php

//think facade 门脸函数使用 静态代理的写法
namespace app\Facade;


class Test extends \think\Facade
{
 //使用静态代理 就无需写 new了
    //protected static function getFacadeClass()  //动态方法绑定时候这些代码可以不需要
   // {
       // return "app\common\Test";
    //}
}