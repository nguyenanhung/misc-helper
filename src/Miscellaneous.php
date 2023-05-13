<?php
/**
 * Project misc-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/02/2023
 * Time: 23:34
 */

namespace nguyenanhung\Libraries\Basic\Miscellaneous;

/**
 * Class Miscellaneous
 *
 * @package   nguyenanhung\Libraries\Basic\Miscellaneous
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Miscellaneous
{
    const VERSION = '2.0.1';
    const HTML_ESCAPE_CHARSET = 'UTF-8';

    public function getVersion(): string
    {
        return self::VERSION;
    }

    public static function dump($str)
    {
        pre_print_r($str);
    }

    public static function dump_die($str)
    {
        pre_print_r_die($str);
    }

    public static function commonMessageVietnamTelco($content = '', $type = 'length', $count_type = 'default')
    {
        $type = mb_strtolower($type);

        if ($type === 'length') {
            return mb_strlen($content);
        }
        if ($type === 'count' && $count_type === 'default') {
            return ceil(mb_strlen($content) / 160);
        }

        return $content;
    }

    public function metronic_get_data_chart($itemList, $valueGet, $total): string
    {
        $dataChart = '';
        $countItemList = count($itemList);
        if ($countItemList > 0) {
            $dataChart .= '[';
            foreach ($itemList as $key => $value) {
                $dataChart .= '{' . '"country" : ' . '"' . $value->$valueGet . '", ';
                $dataChart .= '"visits" : ' . $value->sl . ', ';
                $dataChart .= '"color" : ' . '"#FF9E01"';
                if ($key === $countItemList - 1) {
                    $dataChart .= '}';
                } else {
                    $dataChart .= '}, ';
                }
            }
            if ($total) {
                $dataChart .= ', {"country" : "Total", "visits" : ' . $total . ', "color" : "#0D52D1" }';
            }
            $dataChart .= ']';
        } else {
            $dataChart = '[]';
        }

        return $dataChart;
    }

    public function metronic_get_data_chart_report($itemList, $valueGet): string
    {
        $dataChart = '';
        $countItemList = count($itemList);
        if ($countItemList > 0) {
            $dataChart .= '[';
            foreach ($itemList as $key => $value) {
                $dataChart .= '{' . '"country" : ' . '"' . date('d-m-Y', strtotime($value->date)) . '", ';
                $dataChart .= '"visits" : ' . $value->$valueGet . ', ';
                $dataChart .= '"color" : ' . '"#FF9E01"';
                if ($key === $countItemList - 1) {
                    $dataChart .= '}';
                } else {
                    $dataChart .= '}, ';
                }
            }
            $dataChart .= ']';
        } else {
            $dataChart = '[]';
        }

        return $dataChart;
    }
}
