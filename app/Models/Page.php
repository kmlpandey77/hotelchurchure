<?php

namespace App\Models;

use App\Traits\CacheTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;

    use CacheTrait;

    public function childs()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id', 'id');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public static function getRouteList()
    {
        $ignoreChildOfParent = [];

        return self::getFromCache('routeList', function () use ($ignoreChildOfParent) {
            return self::select('slug')->where('slug', '<>', 'home')->whereNotIn('parent_id', $ignoreChildOfParent)->get()->map(function ($route) {
                return $route['slug'];
            })->toArray();
        });
    }
}