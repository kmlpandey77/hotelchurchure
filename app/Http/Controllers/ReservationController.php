<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __invoke()
    {
        return view('reservation', [
            'rooms' => Room::where('is_active', 1)->get(),
        ]);
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'room_type' => 'required',
            'no_of_room' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'message' => 'required',
        ]);

//        Mail::send(new ContactMail($request));

        return redirect()->route('thank-you');
    }
}
