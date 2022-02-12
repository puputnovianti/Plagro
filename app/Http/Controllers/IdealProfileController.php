<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdealProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.ideal_profile.index');
    }
}
