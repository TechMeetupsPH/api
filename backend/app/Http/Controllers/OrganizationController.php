<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrganizationController extends Controller
{
    public function create(Request $request)
    {
        $parameters = $request->all();

        $organization = new Organization();
        $organization->name = $parameters['name'];
        $organization->about = $parameters['about'];
        $organization->address = $parameters['address'];

        $organization->save();
    }
}
