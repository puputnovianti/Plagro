<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use App\Models\IdealProfile;
use App\Models\RetailerProfile;
use App\Models\Retailer;
use App\Models\RetailerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculationController extends Controller
{
    public function index()
    {
        return view('dashboard.calculation.index', [
            'calculations' => Calculation::all(),
            'retailers' => Retailer::all(),
            'retailer_details' => RetailerDetail::all()
        ]);
    }

    public function show($id)
    {
        $retailer = Retailer::find($id);

        return view(
            'dashboard.calculation.detail',
            [
                'retailer' => $retailer,
                'details' => $retailer->retailerDetails,
                'calculations' => $retailer->calculation

            ]
        );
    }
}
