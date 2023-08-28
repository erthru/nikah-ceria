<?php

if (!function_exists('reverseFormatedDate')) {
    function reverseFormatedDate($date)
    {
        return implode('/', array_reverse(explode('/', str_replace(' 00:00:00', '', $date))));
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