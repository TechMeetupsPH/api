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
        $request->validate([
            'meetup_id' => 'exists:meetup,id',  
            'unique_email_meetup_id' => 'unique_multiple:attendee,email,meetup_id' 
        ]);
        $parameters = $request->all();

        $attendee = new Attendee();
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
