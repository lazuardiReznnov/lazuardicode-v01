<?php
namespace App\Helpers;

use DateTime, Carbon\Carbon;

class Lazuardicode
{
    public static function expire($date1, $date2)
    {
        if (strtotime($date1) <= strtotime($date2)) {
            $css = 'danger';
        } else {
            $css = 'success';
        }
        return $css;
    }

    public static function estimate($date1, $date2)
    {
        $tgl = new DateTime($date1);
        $finish = new DateTime($date2);
        return $tgl->diff($finish)->days;
    }
}
