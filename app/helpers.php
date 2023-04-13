<?php

use Illuminate\Support\Facades\Storage;

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


if (!function_exists('get_image_path')) {
    function get_image_path($path)
    {
        $url = $path ? Storage::disk('local')->url($path) : 'no_img.png';
        return asset($url);
    }
}
