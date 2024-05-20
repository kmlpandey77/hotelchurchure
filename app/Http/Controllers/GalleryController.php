<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Page;

class GalleryController extends Controller
{
    public function __invoke()
    {
        $page = Page::where('slug', request()->path())->first();
        $galleries = Gallery::with('media')->get();

        return view('gallery', compact('page', 'galleries'));
    }
}
