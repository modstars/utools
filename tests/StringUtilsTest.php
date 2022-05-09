<?php
// +----------------------------------------------------------------------
// | ThinkMe
// +----------------------------------------------------------------------
// | 文件描述
// +----------------------------------------------------------------------
// | 创建于：5/7/22
// +----------------------------------------------------------------------
namespace utools;


use PHPUnit\Framework\TestCase;

class StringUtilsTest extends TestCase
{
    private static $string =  "HelloWorld";

    public function testAbbreviate()
    {
        $this->assertSame("Hello...", StringUtils::abbreviate(self::$string, 5), "字符串-判断开头-测试不通过");
    }

    public function testRemoveSpaces()
    {
        $original = "abc  d e f  ";
        $after = "abcdef";
        $this->assertSame($after, StringUtils::removeSpaces($original), "字符串-去空格-测试不通过");
    }

    public function testWrap()
    {
        $this->assertSame("*HelloWorld*", StringUtils::wrap(self::$string, "*"), "字符串-包装-测试不通过");
    }

    public function testRightPad()
    {
        $this->assertSame("HelloWorld****", StringUtils::rightPad(self::$string, 14, "*"), "字符串-右填充-测试不通过");
        $this->assertSame("HelloWorld****", StringUtils::rightPad(self::$string, 14, "*****"), "字符串-右填充-测试不通过");
    }

    public function testLeftPad()
    {
        $this->assertSame("****HelloWorld", StringUtils::leftPad(self::$string, 14, "*"), "字符串-左填充-测试不通过");
        $this->assertSame("****HelloWorld", StringUtils::leftPad(self::$string, 14, "*****"), "字符串-左填充-测试不通过");
    }

    /**
     * 拼接多个字符串
     */
    public function testSplice()
    {
        $this->assertEquals("hello|world", StringUtils::splice("|", "hello", "world"), "字符串-拼接-测试不通过");
    }
}
