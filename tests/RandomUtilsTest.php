<?php
// +----------------------------------------------------------------------
// | ThinkMe
// +----------------------------------------------------------------------
// | 文件描述
// +----------------------------------------------------------------------
// | 创建于：5/10/22
// +----------------------------------------------------------------------
namespace utools;


use PHPUnit\Framework\TestCase;
use utools\random\RandomConstants;

class RandomUtilsTest extends TestCase
{
    public function testStr()
    {
        $this->assertTrue(VerifyUtils::isAlpha(RandomUtils::str(RandomConstants::ALPHA, 10)), "随机-字符串");
    }

    public function testInt()
    {
        $this->assertTrue(RandomUtils::int(3) >= 100, "随机-整数");
    }

    public function testFloat()
    {
        $this->assertTrue(RandomUtils::float() >= 0, "随机-浮点数");
        $this->assertTrue(RandomUtils::float(30, 50) >= 30, "随机-浮点数");
    }

    public function testArr()
    {
        $this->assertCount(0, RandomUtils::arr([1,2], 3), "随机-数组");
        $this->assertCount(3, RandomUtils::arr([1,2,3,4], 3), "随机-数组");
    }

    public function testUuid()
    {
        $this->assertIsString(RandomUtils::uuid());
    }
    public function testUuidSimple()
    {
        $this->assertIsString(RandomUtils::uuidSimple());
    }
}
