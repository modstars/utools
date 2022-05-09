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
     * @return array
     */
    public static function intersect(array $array1, array $array2)
    {
        return array_values(array_intersect($array1, $array2));
    }

    /**
     * 去除多维数组中的空值
     *
     * @param array $arr 目标数组
     * @param array $values 去除的值  默认去除  '',null,false,0,'0',[]
     * @return array
     */
    public static function filter(array $arr, array $values = ['', null, false, 0, '0', []]): array
    {
        foreach ($arr as $k => $v) {
            if (is_array($v) && count($v) > 0) $arr[$k] = self::filter($v, $values);
            foreach ($values as $value) if ($v === $value) {
                unset($arr[$k]);
                break;
            }
        }
        return $arr;
    }

    /**
     * 二维数组根据字段进行排序
     *
     * @param array $array 需要排序的二维数组
     * @param string $field 排序的字段
     * @param string $sort 排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
     * @return mixed
     */
    public static function sequence(array $array, string $field, string $sort = 'SORT_DESC'): array
    {
        $arrSort = array();
        foreach ($array as $index => $row) foreach ($row as $key => $value) {
            $arrSort[$key][$index] = $value;
        }
        array_multisort($arrSort[$field], constant($sort), $array);
        return $array;
    }

    /**
     * 转树状结构
     *
     * @param array $array 要转换的数据集
     * @param string $pk key
     * @param string $parentKey 父级key
     * @param string $child 子级key
     * @param int $root 根
     * @return array
     */
    public static function toTree(array $array, string $pk = 'id', string $parentKey = 'pid', string $child = 'child', int $root = 0): array
    {
        $tree = array();
        if (is_array($array)) {
            $refer = array();
            foreach ($array as $key => $data) $refer[$data[$pk]] = &$array[$key];
            foreach ($array as $key => $data) {
                $parentId = $data[$parentKey];
                if ($root == $parentId) {
                    $tree[] = &$array[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent           = &$refer[$parentId];
                        $parent[$child][] = &$array[$key];
                    }
                }
            }
        }
        return $tree;
    }

    /**
     * 树状结构转数组
     *
     * @param array $tree 树状结构数组
     * @param string $child 子级key
     * @param array $list 引用对象 用作遍历
     * @return array
     */
    public static function fromTree(array $tree, string $child = 'child', array &$list = []): array
    {
        if(is_array($tree)) {
            foreach ($tree as $key => $value) {
                $refer = $value;
                if(isset($refer[$child])){
                    unset($refer[$child]);
                    self::fromTree($value[$child], $child,$list);
                }
                $list[] = $refer;
            }
        }
        return $list;
    }

    /**
     * 转xml
     *
     * @param array $array 数组
     * @return string
     */
    public static function toXml(array $array): string
    {
        $xml = "";
        foreach ($array as $key=>$val) $xml.= is_numeric($val) ? sprintf("<%s>%d</%s>", $key, $val, $key) : sprintf( "<%s><![CDATA[%s]]></%s>", $key, $val, $key);
        return sprintf("%s%s%s", "<xml>", $xml, "</xml>");
    }

    /**
     * xml转数组
     *
     * @param string $xml
     * @return array
     */
    public static function fromXml(string $xml): array
    {
        libxml_disable_entity_loader(true);
        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    }

    /**
     * 字符串转数组
     *
     * @param string $string
     * @return array
     */
    public static function fromString(string $string): array
    {
        $array = [];
        for ($i=0; $i<mb_strlen($string); $i++)
        {
            array_push($array, mb_substr($string, $i, 1));
        }
        return $array;
    }
}
