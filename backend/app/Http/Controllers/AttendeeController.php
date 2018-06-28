<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendee;


class AttendeeController extends Controller
{
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
        $attendee->unique( array('email','meetup_id') );
        $attendee->save();

        return response()->json($attendee->save());
    }

}
