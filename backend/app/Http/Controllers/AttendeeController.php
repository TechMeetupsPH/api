<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Mail;

use App\Attendee; 
use App\Meetup;
use App\Mail\AttendeeJoined;

class AttendeeController extends Controller
{
    private $meetup;

    public function __construct(Meetup $meetup)
    {
        $this->meetup = $meetup;
    }

    public function create(Request $request)
    {
        $parameters = $request->all();

        $attendee = new Attendee();
        $attendee->email = $parameters['email'];
        $attendee->meetup_id = $parameters['meetup_id'];
        $attendee->save();

        $meetup = $this->meetup->find($attendee->meetup_id)->firstOrFail();

        Mail::to($parameters['email'])->send(new AttendeeJoined($meetup, $attendee));

        return response()->json($attendee);
    }
}
