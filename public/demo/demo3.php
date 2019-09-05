<?php
/*1.抽象类  实现类
1 ．抽象类是指在 class 前加了 abstract 关键字且存在抽象方法（在类方法 function 关键字前加了 abstract 关键字）的类。

2 ．抽象类不能被直接实例化。抽象类中只定义（或部分实现）子类需要的方法。子类可以通过继承抽象类并通过实现抽象类中的所有抽象方法，使抽象类具体化。

3 ．如果子类需要实例化，前提是它实现了抽象类中的所有抽象方法。如果子类没有全部实现抽象类中的所有抽象方法，那么该子类也是一个抽象类，必须在 class 前面加上 abstract 关键字，并且不能被实例化。
2.获取静态绑定后的类名
3.魔术函数

*/

abstract class ActiveRecord //抽象类
{
    protected static $table;
    protected $fieldvalues;
    public $select;

    static function findById($id)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id=$id";
        return self::createDomain($query);
    }

    function __get($fieldname)
    {
        return $this->fieldvalues[$fieldname];
    }

    static function __callStatic($method, $args)
    {
        $field = preg_replace('/^findBy(\w*)$/', '$1', $method);
        $query = "SELECT * FROM " . static::$table . " WHERE $field='$args[0]'";
        return self::createDomain($query);
    }

    private static function createDomain($query)
    {
        $class = get_called_class();//获取静态绑定后的类名
        $domain = new $class();
        $domain->fieldvalues = array();
        $domain->select = $query;
        foreach ($class::$fields as $field => $type) {
            $domain->fieldvalues[$field] = 'TODO:set from sql result by ' . $field;
        }
        var_dump($domain);
        var_dump('</br></br>---------------------</br>');
        return $domain;
    }
}

class Customer extends ActiveRecord
{
    protected static $table = 'custdb';
    protected static $fields = array(
        'id' => 'int',
        'email' => 'int',
        'lastname' => 'varchar'
    );
}

var_dump(Customer::findById(123)->email);

class ces
{

    protected $fieldvalues;

    function __construct()
    {
        $this->fieldvalues = array();
        $this->fieldvalues['cesa'] = 'abc';
    }
    public function __call($method,$arg){
        echo '你想调用我不存在的方法',$method,'方法<br/>';
        echo '还传了一个参数<br/>';
        echo print_r($arg),'<br/>';
    }


}

$ces = new ces();
//var_dump($ces);
echo $ces->cesa("11");
