<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use App\Models\Criteria;
use App\Models\IdealProfile;
use App\Models\Profile;
use App\Models\ProfileImage;
use App\Models\RetailerProfile;
use App\Models\Retailer;
use App\Models\RetailerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculationController extends Controller
{
    public function index()
    {
        $retailers = Retailer::latest();
        if (request('search')) {
            $retailers = Retailer::where('location', 'like', '%' . request('search') . '%')->sortable()->paginate(10);
        } else {

            $retailers = Retailer::sortable()->paginate(10);
        }

        return view('dashboard.calculation.index', compact('retailers'));
    }


    public function show($id)
    {
        $retailer = Retailer::find($id);

        return view(
            'dashboard.calculation.detail',
            [
                'retailer' => $retailer,
                'details' => $retailer->retailerDetails,
                'calculations' => $retailer->calculation,
                'tempat_images' => ProfileImage::where('retailer_id', $retailer->id)->where("classification", "Tempat")->get(),
                'fasilitas_images' => ProfileImage::where('retailer_id', $retailer->id)->where("classification", "Fasilitas")->get()

            ]
        );
    }
}
