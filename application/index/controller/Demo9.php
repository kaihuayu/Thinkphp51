<?php

/*验证*/
namespace app\index\controller;
use think\Controller;
//use app\validate\User;
use  app\Facade\User;
//use think\Validate;
use think\facade\Validate;

class Demo9 extends Controller
{          //验证器：使用Validate 类中俄入了属性
    /*
     * 验证器是一个自定义的类，必须继承与框架的验证类think\validate.php
     *验证器可以创建在应用application目录下的任何一个控制器可以访问的目录，只需指定正确的命名空间
     *验证器其实就是完成框架的think\validate类重的属性protected $rule=[]初始化
     * 在控制器中直接实例化调用check()完成验证
     * 还可以创建一个自定的静态代理，来统一验证方法的调用
     * */
        public function  test1(){
            //验证数据
            $data =[
                'name'=>'peter',
                'email'=> 'peter@php.com',
                'password'=>'123adbA',
                'mobile'=>'18644788651'

            ];
          //验证器类
          //  $validate=new User;
           // if (!$validate ->check($data)){ //判断是否通过
           //     return $validate->getError();
         //   }

            //用静态代理的方法 在facade 下添加了User的静态代理类
            if (!User::check($data)){ //判断是否通过
                return User::getError();
               }
            return "验证通过";

        }
        //使用控制器中的validate方法进行验证
        public function test2(){
            //要验证的数据
            $data=[
                'name'=>'peter',
                'email'=>'sfaf@163.com',
                'password'=>'qwee123',
                'mobile'=>'13239932456'
            ];
            //验证规则
            $validate = '\app\validate\User';

            $res = $this->Validate($data,$validate);
            if(true !== $res){
                return $res;
            }
            return "验证通过";
        }
//独立验证；使用的是验证器类think\validate中的rule方法
//rule()方法实际上就是完成给当前类的porotected $rule=[]初始化
//独立验证不依赖于用户自定义的验证器类

        public function  test3(){
            //要验证的规则
    $rule = [
        'name|姓名'=>[ //|姓名 别名中文提示
            'require'=>'require',
            'max'=>20,
            'min'=>5,
        ],
        'email|邮箱'=>[
            'require'=>'require',
            'email'=>'email',

        ],
        'password|密码'=>[
            'require'=>'require',
            'min'=>6,
            'max'=>12,
            'alphaNum' //字母加数字
        ],
        'mobile|手机'=>[
            'require'=>'require',
            'mobile',
        ],
    ];

    //要验证的数据
    $data=[
        'name'=>'peter',
        'email'=>'sfaf@163.com',
        'password'=>'qw#ee123',
        'mobile'=>'13239932456'
    ];
           //初始化rule数据；添加验证字段的验证规则
            Validate::rule($rule);

            if(!Validate::check($data)){
                return Validate::getError();
            };
            return "验证通过";
        }


}