<?php
namespace App\Helpers;

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
}
