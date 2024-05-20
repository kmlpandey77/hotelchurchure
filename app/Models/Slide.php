<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slide extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $attributes = [
        'status' => 1,
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
