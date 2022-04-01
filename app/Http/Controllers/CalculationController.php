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

        $ideal_profiles = [[4, 1], [4, 2], [4, 2]];
        $jumlah = count($ideal_profiles);
        $retailer_profiles = [3, 4, 5];
        $bobot = array();
        $cfactor = array();
        $sfactor = array();

        $gap = [
            $ideal_profiles[0][0] - $retailer_profiles[0], //core factor
            $ideal_profiles[1][0] - $retailer_profiles[1],
            $ideal_profiles[2][0] - $retailer_profiles[2],
        ];

        for ($i = 0; $i < $jumlah; $i++) {
            if ($gap[$i] == 0) {
                $bobot[$i] = 9;
            } elseif ($gap[$i] == 1) {
                $bobot[$i] = 8;
            } elseif ($gap[$i] == -1) {
                $bobot[$i] = 7;
            } elseif ($gap[$i] == 2) {
                $bobot[$i] = 6;
            } elseif ($gap[$i] == -2) {
                $bobot[$i] = 5;
            } elseif ($gap[$i] == 3) {
                $bobot[$i] = 4;
            } elseif ($gap[$i] == -3) {
                $bobot[$i] = 2;
            } elseif ($gap[$i] == 4) {
                $bobot[$i] = 1;
            } else {
                $bobot == 0;
            }
        }


        $cfactor = $bobot[0];
        $sfactor = ($bobot[1] + $bobot[2]) / 2;

        $total = (0.6 * $cfactor) + (0.4 * $sfactor);

        return $total;

        // return view('dashboard.calculation.index', [
        //     'retailers' => Retailer::all(),
        //     'retailer_profiles' => RetailerProfile::all(),
        //     'idealProfiles' => IdealProfile::all(),
        // ]);
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
