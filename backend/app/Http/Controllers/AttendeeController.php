<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Mail;

use App\Attendee; 
use App\Meetup;
use App\Mail\AttendeeJoined;
use App\Http\Requests\StoreAttendee;


class AttendeeController extends Controller
{
    private $meetup;

    public function __construct(Meetup $meetup)
    {
        $this->meetup = $meetup;
    }

    public function create(StoreAttendee $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $parameters = $request->all();

        $attendee = new Attendee();
        $attendee->name = $parameters['name'];
        $attendee->email = $parameters['email'];
        $attendee->meetup_id = $parameters['meetup_id'];
        $attendee->save();

        $meetup = $this->meetup->find($attendee->meetup_id)->firstOrFail();

        try {
            Mail::to($parameters['email'])->send(new AttendeeJoined($meetup, $attendee));
        } catch (\Exception $e) {
            return response()->json([
                'attendee' =>  $attendee,
                'meetup' => $meetup,
                'is_email_sent' => false,
            ]);
        }

        return response()->json([
            'attendee' =>  $attendee,
            'meetup' => $meetup,
            'is_email_sent' => true
        ]);
    }

}
