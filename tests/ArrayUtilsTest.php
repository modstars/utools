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
    public function testIntersect(): array
    {
        $array1 = [1, 2, 3];
        $array2 = [3, 4, 5];
        $array3 = ArrayUtils::intersect($array1, $array2);
        $this->assertCount(1, $array3, "数组-合并-测试不通过");
        return $array3;
    }
}
