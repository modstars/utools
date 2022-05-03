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
    public static function isIPAddress($ip)
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
    public static function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    /**
     * 是否为链接
     *
     * @param $url
     * @return bool
     */
    public static function isUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
    }

    /**
     * 是否为移动手机号码
     *
     * @param string $mobile
     * @return bool
     */
    public static function isMobilePhone($mobile)
    {
        return preg_match('/1[0123456789]\d{9}$/', $mobile) ? true : false;
    }

    /**
     * 是否为固定电话号码
     *
     * @param string $phone
     * @return bool
     */
    public static function isTelephone($phone)
    {
        return preg_match('/^([0-9]{3,4}-)?[0-9]{7,8}$/', $phone) ? true : false;
    }
}
