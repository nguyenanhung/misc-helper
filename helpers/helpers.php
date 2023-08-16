<?php
if (!function_exists('pre_print_r')) {
    function pre_print_r($str = '')
    {
        echo "<pre>";
        print_r($str);
        echo "</pre>";
    }
}
if (!function_exists('vardump_pre')) {
    function vardump_pre($str = '')
    {
        echo "<pre>";
        var_dump($str);
        echo "</pre>";
    }
}
if (!function_exists('pre_print_r_die')) {
    function pre_print_r_die($str = '')
    {
        echo "<pre>";
        print_r($str);
        echo "</pre>";
        die;
    }
}
if (!function_exists('misc_get_pagination_number')) {
    function misc_get_pagination_number($str): int
    {
        $str = str_replace(
            array('trang-', 'Trang-'),
            '',
            $str
        );
        return (int) $str;
    }
}
