<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Facility;
use App\Models\Page;
use App\Models\Review;
use App\Models\Room;
use App\Models\Slide;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function __invoke()
    {
        // Cache::flush();
//        $page = Page::getFromCache(request()->path(), function () {
            $page = Page::where('slug', request()->path())->first();

            if(request()->path() == 'rooms'){
                $rooms = Room::with('media')->paginate();
                $page->rooms = $rooms;
            }

            if(request()->path() == 'facilities'){
                $facilities = Facility::paginate();
                $page->facilities = $facilities;
            }

            if(request()->path() == 'blogs'){
                $blogs = Blog::paginate();
                $page->blogs = $blogs;
            }


//            return [
//                'page' => $page
//            ];
//        });

        return view('page', compact('page'));
    }
}
