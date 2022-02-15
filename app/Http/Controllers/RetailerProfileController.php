<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetailerProfileController extends Controller
{
    public function index()
    {
        return view('retailer.retailer_profile.index');
    }

    public function create()
    {
        return view('retailer.retailer_profile.create');
    }
}
