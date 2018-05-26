<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meetup;

class MeetupController extends Controller
{
    public function list()
    {
        $meetups = Meetup::all();
        return response()->json($meetups->toArray());
    }   

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:256',
            'start_date' => 'required|date_format:Y-m-d H:i:s',
            'end_date' => 'required|date_format:Y-m-d H:i:s',
            'about' => 'required|max:512',
            'address' => 'required|max:512',
        ]);

        $parameters = $request->all();

        $meetup = new Meetup();
        $meetup->title = $parameters['title'];
        $meetup->start_date = $parameters['start_date'];
        $meetup->end_date = $parameters['end_date'];
        $meetup->about = $parameters['about'];
        $meetup->address = $parameters['address'];

        $meetup->save();

        return response()->json($meetup->toArray());
    }

}
