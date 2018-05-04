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
}
