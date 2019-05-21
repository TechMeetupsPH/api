<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meetup;

class HomeController extends Controller
{
    private $meetup;

    public function __construct(Meetup $meetup)
    {
        $this->meetup = $meetup;
    }

    public function show()
    {
        $meetups = $this->meetup->all();
        return view('home', [
            'meetups' => $meetups,
        ]);
    }
}
