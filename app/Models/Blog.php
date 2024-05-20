<?php

namespace App\Models;

use App\Traits\CacheTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use InteractsWithMedia;

    use CacheTrait;

    protected $attributes = [
        'status' => 1,
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function getUrlAttribute()
    {
        return url('blogs', $this->slug);
    }
}
