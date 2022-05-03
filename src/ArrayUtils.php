<?php
// +----------------------------------------------------------------------
// | Think
// +----------------------------------------------------------------------
// | 数组工具类
// +----------------------------------------------------------------------
// | 创建于：5/2/22
// +----------------------------------------------------------------------

namespace utools;


class ArrayUtils
{

    /**
     * 找到两个数组的交集并重新索引
     *
     * @param array $array1 数组1
     * @param array $array2 数组2
     * @return array 交集
     *
     * @example
     * $array1 = array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
     * $array2 = array("e"=>"red","f"=>"black","g"=>"purple");
     * 结果: Array ( [a] => red )
     */
    public static function intersect($array1, $array2)
    {
        return array_values(array_intersect($array1, $array2));
    }


}
