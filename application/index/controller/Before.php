<?php
/*前置操作*/

namespace app\index\controller;
use think\Controller;

class Before  extends Controller
{

    protected $beforeActionList = [
        'komyo', //执行任何方法之前都要执行komyo
        'eat' => ['except' => 'cease'],//除cease方法外的方法执行前都要先执行eat方法
        'drink' => ['only' => 'komyo,cease'],//在komyo,cease方法执行前先执行drink方法
    ];

    public function komyo()
    {
        echo '小明！<br/>';
    }

    public function eat()
    {
        echo '吃！<br/>';
    }

    public function drink()
    {
        echo '喝！<br/>';
    }

    public function cease()
    {
        echo '住！<br/>';
    }



}