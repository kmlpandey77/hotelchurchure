<?php

namespace App\Http\Controllers;

class ThankYouController extends Controller
{
    public function __invoke()
    {
        return view('thank-you');
    }
}
