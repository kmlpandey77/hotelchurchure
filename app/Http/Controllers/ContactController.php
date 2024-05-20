<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke()
    {
        return view('contact', [
            'page' => Page::where('slug', request()->path())->first(),
        ]);
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        Mail::send(new ContactMail($request));

        return redirect()->route('thank-you');
    }
}
