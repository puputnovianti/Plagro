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

    public function create()
    {

        return view('dashboard.calculation.create', [
            'criterias' => Criteria::with(['profiles'])->get(),
            'profiles' => Profile::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $retailer = new Retailer;
        $retailer->email = $data['email'];
        $retailer->name = $data['name'];
        $retailer->location = $data['location'];
        $retailer->save();

        $ideal_profile = IdealProfile::get();
        // dd($ideal_profile);

        if (is_countable($data['retailer_profile_name']) && count($data['retailer_profile_name']) > 0) {
            foreach ($data['retailer_profile_name'] as $item => $value) {
                $data2 = array(
                    'retailer_id' => $retailer->id,
                    'factor_id' => Criteria::where('name', $data['criteria_name'][$item])->first()->factor_id,
                    'criteria_name' => $data['criteria_name'][$item],
                    'retailer_profile_name' => $data['retailer_profile_name'][$item],
                    'retailer_profile_score' => Profile::where('name', $data['retailer_profile_name'][$item])->first()->score,
                    'ideal_profile_name' => $ideal_profile[$item]->profile()->first()->name,
                    'ideal_profile_score' => $ideal_profile[$item]->profile()->first()->score,
                    'gap' => $ideal_profile[$item]->profile()->first()->score - Profile::where('name', $data['retailer_profile_name'][$item])->first()->score,
                );
                RetailerDetail::create($data2);
            }
        }

        //core factors
        $jumlahcf = count(RetailerDetail::where('retailer_id', $retailer->id)->where('factor_id', 1)->get('gap'));
        $cf = RetailerDetail::where('retailer_id', $retailer->id)->where('factor_id', 1)->get();

        $bobotcf = array(); //bobot nilai gap core factors

        for ($i = 0; $i < $jumlahcf; $i++) {
            $corefactor[$i] = $cf[$i]->gap;
            if ($corefactor[$i] == 0) {
                $bobotcf[$i] = 9;
            } elseif ($corefactor[$i] == 1) {
                $bobotcf[$i] = 8;
            } elseif ($corefactor[$i] == -1) {
                $bobotcf[$i] = 7;
            } elseif ($corefactor[$i] == 2) {
                $bobotcf[$i] = 6;
            } elseif ($corefactor[$i] == -2) {
                $bobotcf[$i] = 5;
            } elseif ($corefactor[$i] == 3) {
                $bobotcf[$i] = 4;
            } elseif ($corefactor[$i] == -3) {
                $bobotcf[$i] = 3;
            } elseif ($corefactor[$i] == 4) {
                $bobotcf[$i] = 2;
            } elseif ($corefactor[$i] == -4) {
                $bobotcf[$i] = 1;
            } else {
                $bobotcf == 0;
            }
        }

        $ratacf = array_sum($bobotcf) / $jumlahcf; //rata-rata core factor

        //secondary factor
        $jumlahsf = count(RetailerDetail::where('retailer_id', $retailer->id)->where('factor_id', 2)->get('gap'));
        $sf = RetailerDetail::where('retailer_id', $retailer->id)->where('factor_id', 2)->get();

        $bobotsf = array(); //bobot nilai gap secondary factors
        for ($i = 0; $i < $jumlahsf; $i++) {
            $corefactor[$i] = $sf[$i]->gap;
            if ($corefactor[$i] == 0) {
                $bobotsf[$i] = 9;
            } elseif ($corefactor[$i] == 1) {
                $bobotsf[$i] = 8;
            } elseif ($corefactor[$i] == -1) {
                $bobotsf[$i] = 7;
            } elseif ($corefactor[$i] == 2) {
                $bobotsf[$i] = 6;
            } elseif ($corefactor[$i] == -2) {
                $bobotsf[$i] = 5;
            } elseif ($corefactor[$i] == 3) {
                $bobotsf[$i] = 4;
            } elseif ($corefactor[$i] == -3) {
                $bobotsf[$i] = 3;
            } elseif ($corefactor[$i] == 4) {
                $bobotsf[$i] = 2;
            } elseif ($corefactor[$i] == -4) {
                $bobotsf[$i] = 1;
            } else {
                $bobotsf == 0;
            }
        }

        $ratasf = array_sum($bobotsf) / $jumlahsf; //rata-rata secondary factor

        $totalcf = $ratacf * 0.6; //total core factor
        $totalsf = $ratasf * 0.4; //total secondary factor

        //total nilai
        $total = $totalcf + $totalsf;


        $calculation = new Calculation;
        $calculation->retailer_id = $retailer->id;
        $calculation->cfactor = $totalcf;
        $calculation->sfactor = $totalsf;
        $calculation->total_score = $total;
        $calculation->save();


        return redirect('dashboard/calculation')->with('success', 'Data calon retailer berhasil ditembahkan.');
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
                'tempat_images' => ProfileImage::where('retailer_id', $retailer->id)->where("criteria_name", "Tempat")->get(),
                'fasilitas_images' => ProfileImage::where('retailer_id', $retailer->id)->where("criteria_name", "Fasilitas")->get()

            ]
        );
    }
}
