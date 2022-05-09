<?php
// +----------------------------------------------------------------------
// | ThinkMe
// +----------------------------------------------------------------------
// | 文件描述
// +----------------------------------------------------------------------
// | 创建于：5/8/22
// +----------------------------------------------------------------------
namespace utools;


use PHPUnit\Framework\TestCase;

class VerifyUtilsTest extends TestCase
{
    private static $string =  "HelloWorld";

    public function testIsUrl()
    {
        $this->assertFalse(VerifyUtils::isUrl(self::$string), "验证-链接");
        $this->assertTrue(VerifyUtils::isUrl("http://www.baidu.com"), "验证-链接");
    }

    public function testIsEmail()
    {
        $this->assertFalse(VerifyUtils::isEmail(self::$string), "验证-邮箱");
        $this->assertTrue(VerifyUtils::isEmail("hh@sina.com"), "验证-邮箱");
    }

    public function testIsTelephone()
    {
        $this->assertFalse(VerifyUtils::isTelephone(self::$string), "验证-固定电话号码");
        $this->assertTrue(VerifyUtils::isTelephone("0421-88888888"), "验证-固定电话号码");
    }

    public function testIsIPAddress()
    {
        $this->assertFalse(VerifyUtils::isIPAddress(self::$string), "验证-IP地址");
        $this->assertTrue(VerifyUtils::isIPAddress("192.168.1.1"), "验证-IP地址");
    }

    public function testIsChinese()
    {
        $this->assertFalse(VerifyUtils::isChinese(self::$string), "验证-全是中文");
        $this->assertTrue(VerifyUtils::isChinese("测试"), "验证-全是中文");
    }

    public function testIsContainsChinese()
    {
        $this->assertFalse(VerifyUtils::isContainsChinese(self::$string), "验证-包含中文");
        $this->assertTrue(VerifyUtils::isContainsChinese("测试123abc"), "验证-包含中文");
    }

    public function testIsMobilePhone()
    {
        $this->assertFalse(VerifyUtils::isMobilePhone(self::$string), "验证-移动手机号码");
        $this->assertTrue(VerifyUtils::isMobilePhone("15500000000"), "验证-移动手机号码");
    }

    public function testIsLower()
    {
        $this->assertFalse(VerifyUtils::isLower(self::$string), "验证-全小写");
        $this->assertFalse(VerifyUtils::isLower("测试aa"), "验证-全小写");
        $this->assertFalse(VerifyUtils::isLower("123aa"), "验证-全小写");
        $this->assertTrue(VerifyUtils::isLower("aa"), "验证-全小写");
    }

    public function testIsContainsLower()
    {
        $this->assertTrue(VerifyUtils::isContainsLower(self::$string), "验证-包含小写");
        $this->assertFalse(VerifyUtils::isContainsLower("ABC"), "验证-包含小写");
    }

    public function testIsUpper()
    {
        $this->assertFalse(VerifyUtils::isUpper(self::$string), "验证-全大写");
        $this->assertFalse(VerifyUtils::isUpper("测试aa"), "验证-全大写");
        $this->assertFalse(VerifyUtils::isUpper("123aa"), "验证-全大写");
        $this->assertTrue(VerifyUtils::isUpper("AA"), "验证-全大写");
    }

    public function testIsContainsUpper()
    {
        $this->assertTrue(VerifyUtils::isContainsUpper(self::$string), "验证-包含大写");
        $this->assertFalse(VerifyUtils::isContainsUpper("abc"), "验证-包含大写");
    }

    public function testContains()
    {
        $this->assertTrue(VerifyUtils::isContains(self::$string, "hello", false), "验证-包含");
        $this->assertTrue(VerifyUtils::isContains(self::$string, "Hello", true), "验证-包含");
    }

    public function testIsAnyEmpty()
    {
        $this->assertTrue(VerifyUtils::isAnyEmpty("", null), "验证-判空");
    }

    public function testContainsAny()
    {
        $this->assertTrue(VerifyUtils::isContainsAny(self::$string, false, "hello"), "验证-包含");
        $this->assertTrue(VerifyUtils::isContainsAny(self::$string, true, "Hello"), "验证-包含");
    }

    /**
     * 判断字符串是否以某个字符串开始
     */
    public function testStartsWith()
    {
        $this->assertIsBool(VerifyUtils::isEndsWith(self::$string, "World"), "验证-判断开头");
    }

    /**
     * 判断字符串是否以某个字符串结束
     */
    public function testEndsWith()
    {
        $this->assertIsBool(VerifyUtils::isEndsWith(self::$string, "Hello"), "验证-判断结尾");
    }

    public function testIsAlpha()
    {
        $this->assertTrue(VerifyUtils::isAlpha(self::$string), "验证-全是字母");
        $this->assertFalse(VerifyUtils::isAlpha("abc123"), "验证-全是字母");
    }

    public function testIsContainsAlpha()
    {
        $this->assertTrue(VerifyUtils::isContainsAlpha(self::$string), "验证-包含字母");
        $this->assertTrue(VerifyUtils::isContainsAlpha("abc123"), "验证-包含字母");
        $this->assertFalse(VerifyUtils::isContainsAlpha("我好好"), "验证-包含字母");
        $this->assertFalse(VerifyUtils::isContainsAlpha("123"), "验证-包含字母");
        $this->assertFalse(VerifyUtils::isContainsAlpha("，。，..."), "验证-包含字母");
    }

}
