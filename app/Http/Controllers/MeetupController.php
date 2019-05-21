<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meetup;

class MeetupController extends Controller
{
    private $meetup;

    public function __construct(Meetup $meetup)
    {
        $this->meetup = $meetup;
    }

    public function list()
    {
        $meetups = $this->meetup->all();
        return response()->json($meetups->toArray());
    }   

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:256',
            'start_date' => 'required|date_format:Y-m-d H:i:s',
            'end_date' => 'required|date_format:Y-m-d H:i:s',
            'detail' => 'required|max:512',
            'address' => 'required|max:512',
            'city' => 'required|max:255',
        ]);

        $parameters = $request->all();

        $meetup = new Meetup();
        $meetup->title = $parameters['title'];
        $meetup->start_date = $parameters['start_date'];
        $meetup->end_date = $parameters['end_date'];
        $meetup->detail = $parameters['detail'];
        $meetup->address = $parameters['address'];
        $meetup->city = $parameters['city'];

        $meetup->save();

        return response()->json($meetup->toArray());
    }

}
