<?php
//用户信息表的字段验证器 类

namespace app\validate;
use think\Validate;

class User extends  Validate
{
    //当前验证规则
    protected $rule = [
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
}