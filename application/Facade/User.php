<?php


namespace app\Facade;


class User extends \think\Facade
{
    //使用静态代理 就无需写 new了
    protected static function getFacadeClass()
     {
     return "app\Validate\User";
    }
}