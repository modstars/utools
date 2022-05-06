<?php
// +----------------------------------------------------------------------
// | ThinkMe
// +----------------------------------------------------------------------
// | 文件描述
// +----------------------------------------------------------------------
// | 创建于：5/3/22
// +----------------------------------------------------------------------
namespace utools;


use PHPUnit\Framework\TestCase;

class ArrayUtilsTest extends TestCase
{
    private static $array = [
        ["id" => 1, "pid" => 0, "name" => "张一", "age" => 80],
        ["id" => 2, "pid" => 1, "name" => "张二", "age" => 60],
        ["id" => 3, "pid" => 1, "name" => "张三", "age" => 55],
        ["id" => 4, "pid" => 0, "name" => "李一", "age" => 75],
        ["id" => 5, "pid" => 4, "name" => "李二", "age" => 55]
    ];

    private static $tree_array = [
        ["id" => 1, "pid" => 0, "name" => "张一", "age" => 80, "child" => [
            ["id" => 2, "pid" => 1, "name" => "张二", "age" => 60],
            ["id" => 3, "pid" => 1, "name" => "张三", "age" => 55]
        ]],
        ["id" => 4, "pid" => 0, "name" => "李一", "age" => 75, "child" => [
            ["id" => 5, "pid" => 4, "name" => "李二", "age" => 55]
        ]]
    ];

    /**
     * 数组-交集
     */
    public function testIntersect()
    {
        $this->assertSame([3], ArrayUtils::intersect([1, 2, 3], [3, 4, 5]), "数组-交集-测试不通过");
    }

    /**
     * 数组-过滤
     *
     * @dataProvider filterProvider
     * @param $param
     * @param $result
     */
    public function testFilter($param, $result)
    {
        $this->assertSame($result, ArrayUtils::filter($param), "数组-过滤-测试不通过");
    }

    /**
     * 转树状结构
     *
     */
    public function testToTree()
    {
        $this->assertCount(2, ArrayUtils::toTree(self::$array), "数组-转树结构-测试不通过");
    }

    /**
     * 树状结构转数组
     */
    public function testFromTree()
    {
        $this->assertCount(5, ArrayUtils::fromTree(self::$tree_array), "数组-树状结构转数组-测试不通过");
    }

    /**
     * 转xml
     */
    public function testToXml()
    {
        $array = ["amount"=>101, "name"=>"工具类"];
        $this->assertIsString(ArrayUtils::toXml($array), "数组-转XML-测试不通过");
    }

    /**
     * xml转数组
     */
    public function testFromXml()
    {
        $xml = "<xml><amount>101</amount><name><![CDATA[工具类]]></name></xml>";
        $this->assertIsArray(ArrayUtils::fromXml($xml), "数组-数组转XML-测试不通过");
    }

    /**
     * 二维数组排序
     */
    public function testSequence() {
        $res = ArrayUtils::sequence(self::$array, "age");
        $this->assertEquals(2, $res[2]["id"], "数组-排序-测试不通过");
    }

    /**
     * 数组-过滤-测试数据
     *
     * @return array
     */
    public function filterProvider(): array
    {
        return [
            [
                ["some word", '', null, false, 0, '0', []],
                ["some word"]
            ],
            [
                [
                    ['name' => "name1", 'age' => 18, 'hobby' => "reading"],
                    ['name' => "name2", 'age' => 19, 'hobby' => ""],
                    []
                ],
                [
                    ['name' => "name1", 'age' => 18, 'hobby' => "reading"],
                    ['name' => "name2", 'age' => 19],
                ]
            ]
        ];
    }
}
