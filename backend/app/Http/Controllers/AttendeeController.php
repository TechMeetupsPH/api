<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendee;

class AttendeeController extends Controller
{
    public function create(Request $request)
    {
        $parameters = $request->all();

        $attendee = new Attendee();
        $attendee->email = $parameters['email'];
        $attendee->meetup_id = $parameters['meetup_id'];
        $attendee->save();

        return response()->json($attendee->save());
    }
}
