<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function __invoke($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('blog-show', compact('blog'));
    }
}
