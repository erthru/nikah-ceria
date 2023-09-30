<?php

if (!function_exists('reverseFormatedDate')) {
    function reverseFormatedDate($date)
    {
        $dateOnly = explode(' ', $date)[0];
        return implode('/', array_reverse(explode('/', $dateOnly)));
    }

    function reverseFormatedDateWithTime($date)
    {
        $dateOnly = explode(' ', $date)[0];
        $timeOnly = explode(' ', $date)[1];
        return implode('/', array_reverse(explode('/', $dateOnly))) . ' ' . $timeOnly;
    }
}

if (!function_exists('transalateStatus')) {
    function translateStatus($status)
    {
        switch ($status) {
            case 'UNPAID':
                return 'Menunggu Pembayaran';

            case 'PAID':
                return 'Telah Dibayar';

            case 'CANCELED':
                return 'Dibatalkan';

            default:
                return '';
        }
    }
}
