<?php


namespace app\index\controller;
use app\index\model\User;
use think\Db;
//模型是和一张数据表绑定的

class Modeldemo
{
    public  function get(){
       // dump(user::get(['user_id'=>5]));  //通过模型
      $res= user::field('username,password,mobile')//通过构造器查询复杂查询
            ->where(['user_id'=>5])
            ->find();
       dump($res instanceof User);  //返回 true 是个对象

      /*  $res=Db::table('user')           //数据库方式
            ->field('username,password,mobile')//通过构造器查询复杂查询
        ->where(['user_id'=>6])
            ->find();
        dump($res);*/  //返回的是个数组
    }

    public  function all(){ //查询多条
       // dump(user::all());  //通过模型
        $res= user::field('username,password,mobile')//通过构造器查询复杂查询
            ->where('user_id' ,'in', '5, 6, 7, 8')
            ->select();
        dump($res);

    }
}