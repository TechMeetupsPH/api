<?php

namespace App\Http\Controllers;

use Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $user = User::create(request(['name', 'email', 'password']));

        Auth::login($user);

        return redirect('/home');
    }
}
