<?php
class Tools {

    /**1.__call()方法。当调用一个没有在类中声明的方法时，可以调用__call()方法代替声明一个方法。接受方法名和数组作为参数。.
     * 2.__callStatic()方法。从PHP5.3开始出现此方法，当创建一个静态方法以调用该类中不存在的一个方法时使用此函数。与__call()方法相同，接受方法名和数组作为参数。
     * 利用魔术方法__call实现伪重载。。。
     * @return [type] [description]
     */
    public function __call($name, $args) {
        if ($name === "sum") {
            switch (count($args)) {
                case 2:
                    //求和：两个数
                    return $this->sum2($args[0], $args[1]);
                    break;
                case 3:
                    //求和：三个数
                    return $this->sum3($args[0], $args[1], $args[2]);
                    break;
            }
        }
    }

    /**
     * 利用魔术方法__callStatic实现伪重载。。。
     * @return [type] [description]
     */
    public static function __callStatic($name, $args) {
        if ($name === "area") {
            switch (count($args)) {
                case 1:
                    //计算圆的面积
                    return self::areaCircle($args[0]);
                    break;
                case 2:
                    //计算矩形的面积
                    return self::areaRectangle($args[0], $args[1]);
                    break;
            }
        }
    }

    /**
     * 计算圆的面积
     * @param  [type] $r [description]
     * @return [type]    [description]
     */
    public static function areaCircle($r) {
        return pi() * $r * $r;
    }

    /**
     * 计算矩形的面积
     * @param  [type] $length [description]
     * @param  [type] $width  [description]
     * @return [type]         [description]
     */
    public static function areaRectangle($length, $width) {
        return $length * $width;
    }

    /**
     * 求和：两个数
     * @param  [type] $num1 [description]
     * @param  [type] $num2 [description]
     * @return [type]       [description]
     */
    public function sum2($num1, $num2) {
        return $num1 + $num2;
    }

    /**
     * 求和：三个数
     * @param  [type] $length [description]
     * @param  [type] $width  [description]
     * @return [type]         [description]
     */
    public function sum3($num1, $num2, $num3) {
        return $num1 + $num2 + $num3;
    }
}

//测试开始

echo Tools::area(2) . "<br/>";

echo Tools::area(2, 4) . "<br/>";

$tools = new Tools();

echo $tools->sum(2, 3) . "<br/>";
echo $tools->sum(2, 3, 4) . "<br/>";