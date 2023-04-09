<?php

if (!function_exists('greeting')) {
    function greeting()
    {
        date_default_timezone_set(config('app.timezone'));
        $hour = date('H', time());
        
        if ($hour > 4 && $hour <= 11) {
            echo "Good Morning";
        } else if ($hour > 11 && $hour <= 16) {
            echo "Good Afternoon";
        } else if ($hour > 16 && $hour <= 23) {
            echo "Good Evening";
        } else {
            echo "Why aren't you asleep?  Are you programming?";
        }
    }
}

if (!function_exists('money')) {
    function money($int)
    {
        return $int ? number_format($int) . ' ' . config('app.currency_code') : null;
    }
}
