<?php
// +----------------------------------------------------------------------
// | ThinkMe
// +----------------------------------------------------------------------
// | 文件描述
// +----------------------------------------------------------------------
// | 创建于：5/2/22
// +----------------------------------------------------------------------

namespace utools;


class DateTimeUtils
{

    /**
     * 检查年、月、日是有效组合。
     *
     * @param integer $y year
     * @param integer $m month
     * @param integer $d day
     * @return boolean true if valid date, semantic check only.
     */
    public static function isValidDate($y, $m, $d)
    {
        return checkdate($m, $d, $y);
    }

    /**
     * 检查日期是否合法日期。
     *
     * @param string $date 2012-1-12
     * @param string $separator
     * @return boolean true if valid date, semantic check only.
     */
    public static function checkDate($date, $separator = "-")
    {
        $dateArr = explode($separator, $date);
        return self::isValidDate($dateArr[0], $dateArr[1], $dateArr[2]);
    }
}
