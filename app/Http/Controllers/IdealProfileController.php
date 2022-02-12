<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\IdealProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class IdealProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.ideal_profile.index', [
            'ideal_profiles' => IdealProfile::orderBy('id')->get(),
            'profile' => Profile::orderBy('id')->get(),
            'criteria' => Criteria::orderBy('id')->get(),
        ]);
    }
}
