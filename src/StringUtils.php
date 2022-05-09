<?php
// +----------------------------------------------------------------------
// | ThinkMe
// +----------------------------------------------------------------------
// | 文件描述
// +----------------------------------------------------------------------
// | 创建于：5/2/22
// +----------------------------------------------------------------------

namespace utools;


class StringUtils
{
    /**
     * 拼接多个字符串
     *
     * @param string $glue 拼接符
     * @param string ...$strings 要拼接的多个字符串
     * @return string 拼接后的字符串
     */
    public static function splice($glue = "", ...$strings): string
    {
        return implode($glue, $strings);
    }

    /**
     * 删除空格
     *
     * @param string $string
     * @return string
     */
    public static function removeSpaces(string $string): string
    {
        return strtr($string, array(' ' => ''));
    }

    /**
     * 右边用指定的字符补全至指定长度
     *
     * @param string $string 需要补全的字符串
     * @param int $length 指定长度
     * @param string $padStr 指定补全字符串
     * @return string
     */
    public static function rightPad(string $string, int $length, string $padStr = "*"): string
    {
        if (empty($string)) return $string;
        list($padLength, $strLength) = [mb_strlen($padStr), mb_strlen($string)];
        $pads = $length - $strLength;
        if ($pads <= 0) return $string;
        $padString = ($pads > $padLength) ? str_repeat($padStr, ceil(bcdiv($pads, $padLength))) : $padStr; // 计算最终需要补全的字符串
        return self::splice("", $string, mb_strcut($padString, 0, $pads));
    }

    /**
     * 左边边用指定的字符补全至指定长度
     *
     * @param string $string 需要补全的字符串
     * @param int $length 指定长度
     * @param string $padStr 指定补全字符串
     * @return string
     */
    public static function leftPad(string $string, int $length, string $padStr = "*"): string
    {
        if (empty($string)) return $string;
        list($padLength, $strLength) = [mb_strlen($padStr), mb_strlen($string)];
        $pads = $length - $strLength;
        if ($pads <= 0) return $string;
        $padString = ($pads > $padLength) ? str_repeat($padStr, ceil(bcdiv($pads, $padLength))) : $padStr; // 计算最终需要补全的字符串
        return self::splice("", mb_strcut($padString, 0, $pads), $string);
    }

    /**
     * 包装，前后拼了相同的串
     *
     * @param string $string 原字符串
     * @param string $wrapWith 要拼接的字符串
     * @return string
     */
    public static function wrap(string $string, string $wrapWith)
    {
        return !empty($string) && !empty($wrapWith) ? self::splice("", $wrapWith, $string, $wrapWith) : $string;
    }

    /**
     * @param string $string
     * @param int $length
     * @param string $suffix
     * @return string
     */
    public static function abbreviate(string $string, int $length, string $suffix = "..."): string
    {
        $stringLength = mb_strlen($string);
        $abbString    = (!empty($string) && $length < $stringLength) ? mb_strcut($string, 0, $length) : $string;
        return self::splice("", $abbString, $suffix);
    }
}
