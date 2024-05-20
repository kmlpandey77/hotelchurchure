<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Label extends Model
{
    public function scopeOfValue($query, $labelid)
    {
        $label = $query->where('label_id', $labelid)->first();
        return $label ? ($label->value ? $label->value : '&nbsp;') : $labelid;
    }

    public static function getValue($labelId)
    {
        list($page, $id) = explode(':', $labelId);

        $labels = Cache::remember('labels.' . $page, 30 * 24 * 60, function () use ($page) {
            return self::select('label_id', 'value')->where('page', $page)->get()->pluck('value', 'label_id')->toArray();
        });

        if (isset($labels[$labelId])) {
            $value = $labels[$labelId];
            return $value ?? $labelId;
        }
        return $labelId;
    }
}
