<?php

namespace App\Http\Controllers;

use App\Models\IdealProfile;
use App\Models\RetailerProfile;
use App\Models\Retailer;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index()
    {
        return view('dashboard.calculation.index', [
            'retailers' => Retailer::all(),
            'retailer_profiles' => RetailerProfile::all(),
            'idealProfiles' => IdealProfile::all(),
        ]);
    }

    public function show($id)
    {
        $retailer = Retailer::find($id);
        $ideal_profiles = IdealProfile::all();


        return view(
            'dashboard.calculation.detail',
            [
                'retailer' => $retailer,
                'profiles' => $retailer->retailerProfiles,
                'ideal_profiles' => $ideal_profiles,
            ]
        );
    }
}
