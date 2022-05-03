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
     *
     * @example
     * splice($glue = "|", "hello", "world")
     * 结果："hello|world"
     */
    public static function splice($glue = "", ...$strings)
    {
        return implode($glue, $strings);
    }
}
