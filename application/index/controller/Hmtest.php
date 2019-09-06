<?php


namespace app\index\controller;
use app\index\model\User;
use think\Controller;

class Hmtest extends controller
{
     public function hm(){
         $re=user::with("hasmanyorder")->where("user_id",5)->find();
         var_dump($re);
     }
}