<?php
// +----------------------------------------------------------------------
// | ThinkMe
// +----------------------------------------------------------------------
// | 文件描述
// +----------------------------------------------------------------------
// | 创建于：5/10/22
// +----------------------------------------------------------------------

namespace utools;

use utools\random\RandomConstants;


class RandomUtils
{
    /**
     * 随机字符串
     *
     * @param string $scope 范围
     * @param int $length 长度
     * @return string
     */
    public static function str(string $scope, int $length): string
    {
        $array  = ArrayUtils::fromString($scope);
        $keys   = array_rand($array, $length);
        $keys   = is_array($keys) ? $keys : [$keys];
        $random = "";
        foreach ($keys as $key) $random .= $array[$key];
        return $random;
    }

    /**
     * 随机整数
     *
     * @param int $length 长度
     * @return int
     */
    public static function int(int $length): int
    {
        return intval(self::str(RandomConstants::NUMBER, $length));
    }

    /**
     * 随机浮点数
     *
     * @param int $min 最小
     * @param int $max 最大
     * @return float|int
     */
    public static function float($min = 0, $max = 1): float
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

    /**
     * 随机数组
     * 如果数组长度小于随机的长度，返回空数组
     *
     * @param array $origin 原数组
     * @param int $length 长度
     * @return array
     */
    public static function arr(array $origin, int $length): array
    {
        if (count($origin) < $length) return [];
        $keys   = array_rand($origin, $length);
        $keys   = is_array($keys) ? $keys : [$keys];
        $random = [];
        foreach ($keys as $key) array_push($random, $origin[$key]);
        return $random;
    }

    /**
     * 生成UUID
     *
     * @return string
     */
    public static function uuid(): string
    {
        $chars = md5(uniqid(mt_rand(), true));
        $uuid  = StringUtils::splice("-", substr($chars, 0, 8), substr($chars, 8, 4), substr($chars, 12, 4), substr($chars, 16, 4), substr($chars, 20, 12));
        return $uuid;
    }

    /**
     * 生成UUID
     *
     * @return string
     */
    public static function uuidSimple(): string
    {
        $chars = md5(uniqid(mt_rand(), true));
        $uuid  = StringUtils::splice("", substr($chars, 0, 8), substr($chars, 8, 4), substr($chars, 12, 4), substr($chars, 16, 4), substr($chars, 20, 12));
        return $uuid;
    }
}
