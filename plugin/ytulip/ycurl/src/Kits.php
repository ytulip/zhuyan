<?php
namespace Ytulip\Ycurl;
class Kits{
    /**
     * @param $dateStr
     * @return days
     */
    static public function daysToNow($dateStr){
        $second1 = strtotime(date('Y-m-d'));
        $second2 = strtotime($dateStr);
        return ($second1 - $second2) / 86400;
    }
}