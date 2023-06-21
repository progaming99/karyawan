<?php

if (!function_exists('changeDateFormat')) {
    function changeDateFormat($format, $originalDate)
    {
        return date($format, strtotime($originalDate));
    }
}
