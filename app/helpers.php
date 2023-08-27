<?php

if (!function_exists('reverseFormatedDate')) {
    function reverseFormatedDate($date)
    {
        return implode('/', array_reverse(explode('/', str_replace(' 00:00:00', '', $date))));
    }
}
