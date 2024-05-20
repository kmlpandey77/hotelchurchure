<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public static function mainMenu($id = 1)
    {
        $menu = Menu::with('pages')->find($id);

        if ($menu && $menu->pages) {
            $main_menu = [];
            foreach ($menu->pages as $page) {
                $main_menu += self::page_child($page);
            }

            return $main_menu;
        }
        return [];
    }

    private static function page_child($page)
    {
        $menu[$page->id == 1 || $page->slug == 'home' ? '/' : "/{$page->slug}"] = $page->title;

        if ($child = $page->child) {
            $sub = [];
            foreach ($child as $c) {
                $sub += self::page_child($c);
            }
            $menu["/{$page->slug}"] = $menu + ['sub' => $sub];
        }

        return $menu;
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }
}