<?php
// +----------------------------------------------------------------------
// | ThinkMe
// +----------------------------------------------------------------------
// | 文件描述
// +----------------------------------------------------------------------
// | 创建于：5/2/22
// +----------------------------------------------------------------------

namespace utools;


class VerifyUtils
{
    /**
     * 是否为IP地址
     *
     * @param string $ip
     * @return bool
     */
    public static function isIPAddress(string $ip): bool
    {
        $ipv4Regex = '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/';
        $ipv6Regex = '/^(((?=.*(::))(?!.*\3.+\3))\3?|([\dA-F]{1,4}(\3|:\b|$)|\2))(?4){5}((?4){2}|(((2[0-4]|1\d|[1-9])?\d|25[0-5])\.?\b){4})$/i';
        return (preg_match($ipv4Regex, $ip))
        || (false !== strpos($ip, ':') && preg_match($ipv6Regex, trim($ip, ' []'))) ? true : false;
    }

    /**
     * 是否为邮箱
     *
     * @param string $email
     * @return bool
     */
    public static function isEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    /**
     * 是否为链接
     *
     * @param $url
     * @return bool
     */
    public static function isUrl(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
    }

    /**
     * 是否为移动手机号码
     *
     * @param string $mobile
     * @return bool
     */
    public static function isMobilePhone(string $mobile): bool
    {
        return preg_match('/1[0123456789]\d{9}$/', $mobile) ? true : false;
    }

    /**
     * 是否为固定电话号码
     *
     * @param string $phone
     * @return bool
     */
    public static function isTelephone(string $phone): bool
    {
        return preg_match('/^([0-9]{3,4}-)?[0-9]{7,8}$/', $phone) ? true : false;
    }

    /**
     * 是否包含中文
     *
     * @param string $string
     * @return bool
     */
    public static function isContainsChinese(string $string): bool
    {
        return preg_match('/[\x7f-\xff]/', $string) ? true : false;
    }

    /**
     * 是否全是中文
     *
     * @param string $string
     * @return bool
     */
    public static function isChinese(string $string): bool
    {
        return preg_match('/^[\x7f-\xff]+$/', $string) ? true : false;
    }

    /**
     * 是否全为小写
     * 函数 ctype_lower()
     *
     * @param string $string
     * @return bool
     */
    public static function isLower(string $string): bool
    {
        foreach (ArrayUtils::fromString($string) as $item) if (ord($item) < ord('a') || ord($item) > ord('z')) {
            return false;
        }
        return true;
    }

    /**
     * 是否包含小写字母
     *
     * @param string $string
     * @return bool
     */
    public static function isContainsLower(string $string): bool
    {
        foreach (ArrayUtils::fromString($string) as $item) if (ord($item) >= ord('a') && ord($item) <= ord('z')) {
            return true;
        }
        return false;
    }

    /**
     * 是否全为大写
     * 函数：ctype_upper()
     *
     * @param string $string
     * @return bool
     */
    public static function isUpper(string $string): bool
    {
        foreach (ArrayUtils::fromString($string) as $item) if (ord($item) < ord('A') || ord($item) > ord('Z')) {
            return false;
        }
        return true;
    }

    /**
     * 是否包含大写
     *
     * @param string $string
     * @return bool
     */
    public static function isContainsUpper(string $string): bool
    {
        foreach (ArrayUtils::fromString($string) as $item) if (ord($item) >= ord('A') && ord($item) <= ord('Z')) {
            return true;
        }
        return false;
    }

    /**
     * 判断字符串是否以某个字符串开始
     *
     * @param string $string 待判断的字符串
     * @param string $subString 包含的字符串
     * @return bool
     */
    public static function isStartsWith(string $string, string $subString): bool
    {
        return substr($string, 0, mb_strlen($subString)) === $subString;
    }

    /**
     * 判断字符串是否以某个字符串结束
     *
     * @param string $string 待判断的字符串
     * @param String $subString 包含的字符串
     * @return bool
     */
    public static function isEndsWith(string $string, String $subString): bool
    {
        return substr($string, strpos($string, $subString)) === $subString;
    }

    /**
     * 任意为空返回true
     *
     * @param mixed ...$strings
     * @return bool
     */
    public static function isAnyEmpty(...$strings): bool
    {
        $isEmpty = false;
        foreach ($strings as $string) if (empty($string)) {
            $isEmpty = true;
            break;
        }
        return $isEmpty;
    }

    /**
     * 判断字符串包含
     *
     * @param string $string
     * @param string $subString
     * @param bool $sensitive
     * @return bool
     */
    public static function isContains(string $string, string $subString, bool $sensitive = false): bool
    {
        return $sensitive ? !strpos($string, $subString === false) : !stripos($string, $subString === false);
    }

    /**
     * 包含任意字符串返回true
     *
     * @param string $string
     * @param array $subStrings
     * @param bool $sensitive
     * @return bool
     */
    public static function isContainsAny(string $string, bool $sensitive = false, ...$subStrings): bool
    {
        $isContains = false;
        foreach ($subStrings as $subString) if (self::isContains($string, $subString, $sensitive)) {
            $isContains = true;
            break;
        }
        return $isContains;
    }

    /**
     * 是否全是字母
     *
     * @param string $string
     * @return bool
     */
    public static function isAlpha(string $string) : bool
    {
        return ctype_alpha($string);
    }

    /**
     * 是否包含字母
     *
     * @param string $string
     * @return bool
     */
    public static function isContainsAlpha(string $string): bool
    {
        foreach (ArrayUtils::fromString($string) as $item) if (ctype_alpha($item)) {
            return true;
        }
        return false;
    }
}
