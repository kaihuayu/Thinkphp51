<?php


namespace app\index\controller;
use think\Db;
/*连接数据库
1..全局配资；配置Database.php文件
2.动态配置
3.dNS 连接：数据库类型;// 用户名:密码@数据库地址:端口号/数据库名称*字符集


*/
class Dataoperation
{
    public function conn1(){
        $list = Db::table("user")
                  ->where('user_id',5)
                ->value("username");
                 var_dump($list);
       return ; // $list;
    }

    //动态配置
    public function conn2(){
        return Db::connect([
            'type'=>'mysql',
            'hostname' =>'127.0.0.1',
            'database' => 'demotp5',
            'username'=> 'root',
            'password'=> '123'

        ])
                ->table('user')
                ->where('user_id',5)
               ->value("username");
    }

    //dns连接
    public function conn3()
    {
        $dsn = 'mysql://root:123@127.0.0.1:3306/demotp5#utf8';
        return Db::connect($dsn)
            ->table('user')
            ->where('user_id', 6)
            ->value('username');
    }

        /*数据库增删改查CURD操作
        查询构造器
        app_debug =>true
        app_trace = > true  应用更总器打开*/
        //单条查询 DB类数据库操作的入口类 功能静态调用 think|\db\Query.php类中的查询方法实现基本操作
    // find() 返回符合条件的第一条记录 没有返回 NULL
        public function asingle(){
           $res =  Db::table('user')
               //->field("user_id,username,password")
               ->field('user_id as 编号,password  as 密码')//设置字段 或别名
               ->where("user_id","=",27)->find(); //如果相等关系等号可省略
           var_dump(is_null($res)  ?  "没找到":$res );
           return ;

         }

         public function  multiple(){
            //返回的是以哥二维数组  select 多条查询
            $res = Db::table('user')
                ->field('user_id,username')
                ->where([
                    ['nickname','like','盈讯%'],
                    ['user_id','<',10]
                ])
                ->select();
            //var_dump($res);
            if(empty($res)){
                return "没有满足条件的查询";
             }else
                 {
                 foreach ($res as $row){ //通过变量获取数据
                     dump ($res);
                 }
             }
         }

         //单条插入
    public function insert(){
            //insert() 成功返回新增的数量，失败返回false
        $data = [
              'username' => '李逍遥2',
              'password' => '121wqewr243',
              'mobile'     => '13311111111',
               'nickname' =>'逍遥派'
        ];
        $res = Db::table('user')

           // ->insert($data);
             //->insert($data,true); //加上 true后  以replace into  方式添加数据 只有数据库类型为MYSQL的时候才可以传入TRUE
       // ->data($data)->insert();  //data方法插入 可以过滤数据  更安全
          ->insertGetId($data); //insertGetId 执行两步操作，第一步插入，第二步返回主键ID
        return $res;
    }

//添加多条
    public function insertALL(){
            $data = [
                ['username' => '李逍遥3','password' => '121wqewr243', 'mobile'     => '13311111111'],
                ['username' => '李逍遥4','password' => '121wqewr243', 'mobile'     => '13311111111'],
                ['username' => '李逍遥5','password' => '121wqewr243', 'mobile'     => '13311111111'],

            ];
            $res = Db::table('user')
                ->insertAll($data);
            return $res;
    }

    //更新
    public function update(){
          //  return Db::table('user')
            //    ->where('user_id',87)
            //    ->update(['username'=>'段玉']);

            //如果更新的条件是主键的话，可以直接吧主键写到数组中
        return Db::table('user')
            ->update(['username'=>'段玉2','user_id'=>86]);

    }

    public function delete(){
            return Db::table('user')
                ->where('user_id',87)
                ->delete();
              //  ->delete(86); //不用where 直接在delete中写要删的ID
    }
// 原生查询
    public function query(){
            $sql='select username from user where user_id =85';
            $res=Db::query($sql);
            dump($res);
    }
    //原生写操作 更新 删除 添加
    public function execute(){
         //return   Db::execute("update user set username = '武松' where user_id=81"); //更新
       // return   Db::execute("delete from user where user_id=81"); //删除
        return   Db::execute("insert  user set  username ='小潘', password='afsadfdsafsadf'");

    }
}