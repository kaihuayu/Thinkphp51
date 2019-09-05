<?php


namespace app\index\controller;
use think\Controller;
use app\index\model\User;
/*对应 view 视图目录名小写*/
use think\facade\View;  //静态代理引用
class Viewtest extends controller
{
    public function test(){
        //.直接输出内容 不通过模板
        $content = '<h3 style="color:red">think php 51</h3>';
        //return $this->display($content);
        //return $this->view ->display($content); //view 是controller的一个属性，视图类的实例
        return view::display($content); //静态代理方法
    }
    public function test2(){
        //使用视图输出数据 fetch();
       $this->view-> assign('name','php中国');
       $this->view->assign('age',88);
       $this->view->assign([
           "sex"=>"男",
               'salary'=>888
       ]);
// 数组
       $this->view->assign('goods',[
           'id'=>1,
           'name'=>'手机',
           'model'=>'荣耀华为',
           'price'=> 1001

        ]);
       //对象
        $obj = new \stdClass();
        $obj->course ='php';  //对象属性
        $obj->leture ='php china';
        $this->view->assign('inf',$obj);

        //const输出
        define('SITE_NAME','PHP CHINA');

       //在模板中输出数据
        // 模板默认目录 view 目录，模板文件默认位于以当前控制器命名的目录中，html文件名同方法名

        return $this->view->fetch();  //retunr view();简写
    }

    public function  test3(){
        //常用模板标签
        $data = user::select();
        //dump($data);
        $this->view->assign('data',$data);
        return $this->view->fetch();
  }

  public function test4(){
      //分页 调用查询类中的paginate(num) 分页
      $page = 15;
      $data = user::paginate($page);
      //dump($data);
      $this->view->assign('data', $data);
      return $this->view->fetch();
  }
}