<?php

if (!function_exists('nmr_format')) {
    function nmr_format($number)
    {
        return '$'.number_format($number);
    }
}

if (!function_exists('setting')) {
    function setting($title, $default = null)
    {
        return \App\Models\Setting::getValue($title, $default);
    }
}

if (!function_exists('label')) {
    function label($labelId, $br = false)
    {
        $value = \App\Models\Label::getValue($labelId);
        if($br)
            return nl2br($value);

        return $value;
    }
}

if (!function_exists('breadcrumb')) {
    function breadcrumb($page)
    {
        return new \App\Models\Breadcrumb($page);
    }
}

if (!function_exists('asset')) {
    function asset($path)
    {
        $url = 'https://assets.'.config('app.domain');

        return $url.'/'.$path;
    }
}

if (!function_exists('review_count')) {
    function review_count()
    {
        return Review::count();
    }
}
