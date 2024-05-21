<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Page;
use App\Models\Recommendation;
use App\Models\Room;
use App\Models\Slide;

class HomeController extends Controller
{
    public function __invoke()
    {
        $slides = Slide::with('media')->take(5)->get();
        $page = Page::find(5);
        $rooms = Room::with('media')->take(3)->get();
        $facilities = Facility::take(3)->get();
        $recommendations = Recommendation::where('status', 1)->take(5)->get();

        return view('index', compact('slides', 'page', 'rooms', 'facilities', 'recommendations'));
    }
}
