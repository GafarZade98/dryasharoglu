<?php

use App\Models\Settings;

if (!function_exists('setting')) {

    /**
     * description
     *
     * @param string
     * @return string
     */
    function setting($key = 'title')
    {
         return Settings::where('settings_key',$key)->first()->settings_value;
    }
}

