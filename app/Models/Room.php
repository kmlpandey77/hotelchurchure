<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Room extends Model implements HasMedia
{
    use InteractsWithMedia;
    use SoftDeletes;

    protected $casts = [
        'facilities' => 'array',
        'extra' => 'array',
    ];
}
