<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait CacheTrait
{
    /**
     * @param  string  $name
     * @param  callable  $callback
     * @return mixed
     */
    public static function getFromCache(string $name, callable $callback)
    {
        $name = (new static())->getTable().'.'.$name;

        return Cache::remember($name, 24 * 60 * 60, $callback);
    }

    public static function cacheClear(string | array $name)
    {
        $name = (new static())->getTable().'.'.$name;

        Cache::forget($name);
    }
}
