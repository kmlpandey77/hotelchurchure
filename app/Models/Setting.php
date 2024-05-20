<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;
    public function scopeOfValue($query, $title)
    {
        $setting = $query->where('title', $title)->first();
        return $setting ? ($setting->value ? $setting->value : '&nbsp;') : $title;
    }

    public static function getValue($title, $default = null)
    {
        $settings = Cache::rememberForever('settings', function () {
            return self::select('title', 'value')->get()->pluck('value', 'title')->toArray();
        });

        if (isset($settings[$title])) {
            $value = $settings[$title];
            return $value??$default;
        }
        return $default;
    }
}
