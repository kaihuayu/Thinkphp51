<?php
/*Model 首字符大写*/

namespace app\index\model;
use think\Model;

class User extends Model
{
    public function hasmanyorder(){
        return $this->hasMany("Order",'user_id','user_id');
    }
}