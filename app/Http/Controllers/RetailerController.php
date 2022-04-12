<?php

namespace App\Http\Controllers;

use App\Mail\NotifikasiPendaftaran;
use App\Models\Criteria;
use App\Models\Calculation;
use App\Models\IdealProfile;
use App\Models\Profile;
use App\Models\Retailer;
use App\Models\RetailerDetail;
use App\Models\RetailerProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'home',
            [
                'criterias' => Criteria::with(['profiles'])->get(),
                'profiles' => Profile::all(),
                'ideal_profiles' => IdealProfile::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('retailer.create', [
            'criterias' => Criteria::with(['profiles'])->get(),
            'profiles' => Profile::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $retailer = new Retailer;
        $retailer->email = $data['email'];
        $retailer->name = $data['name'];
        $retailer->location = $data['location'];
        $retailer->save();


        if (is_countable($data['retailer_profile_name']) && count($data['retailer_profile_name']) > 0) {
            foreach ($data['retailer_profile_name'] as $item => $value) {
                $data2 = array(
                    'retailer_id' => $retailer->id,
                    'factor_id' => Criteria::where('name', $data['criteria_name'][$item])->first()->factor_id,
                    'criteria_name' => $data['criteria_name'][$item],
                    'retailer_profile_name' => $data['retailer_profile_name'][$item],
                    'retailer_profile_score' => Profile::where('name', $data['retailer_profile_name'][$item])->first()->score,
                    'ideal_profile_name' => $data['ideal_profile_name'][$item],
                    'ideal_profile_score' => $data['ideal_profile_score'][$item],
                    'gap' => $data['ideal_profile_score'][$item] - Profile::where('name', $data['retailer_profile_name'][$item])->first()->score,


                );
                RetailerDetail::create($data2);
            }
        }

        //core factors
        $jumlahcf = count(RetailerDetail::where('retailer_id', $retailer->id)->where('factor_id', 1)->get('gap'));
        $cf = RetailerDetail::where('retailer_id', $retailer->id)->where('factor_id', 1)->get();

        $bobotcf = array();

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
                $bobotcf[$i] = 2;
            } elseif ($corefactor[$i] == 4) {
                $bobotcf[$i] = 1;
            } else {
                $bobotcf == 0;
            }
        }

        $totalcf = array_sum($bobotcf) / $jumlahcf; //rata-rata core factor

        //secondary factor
        $jumlahsf = count(RetailerDetail::where('retailer_id', $retailer->id)->where('factor_id', 2)->get('gap'));
        $sf = RetailerDetail::where('retailer_id', $retailer->id)->where('factor_id', 2)->get();

        $bobotsf = array();
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
                $bobotsf[$i] = 2;
            } elseif ($corefactor[$i] == 4) {
                $bobotsf[$i] = 1;
            } else {
                $bobotsf == 0;
            }
        }

        $totalsf = array_sum($bobotsf) / $jumlahsf; //rata-rata secondary factor

        //total nilai
        $total = ($totalcf * 0.6) + ($totalsf * 0.4);

        return $total;





        // $bobot = array();
        // if (is_countable($data['retailer_profile_name']) && count($data['retailer_profile_name']) > 0) {
        //     foreach ($data['retailer_profile_name'] as $item => $value) {
        //         $gap = array(
        //             $data['ideal_profile_score'][$item] - Profile::where('name', $data['retailer_profile_name'][$item])->first()->score
        //         );
        //         if ($gap[$item] == 0) {
        //             $bobot[$item] = 9;
        //         } elseif ($gap[$item] == 1) {
        //             $bobot[$item] = 8;
        //         } elseif ($gap[$item] == -1) {
        //             $bobot[$item] = 7;
        //         } elseif ($gap[$item] == 2) {
        //             $bobot[$item] = 6;
        //         } elseif ($gap[$item] == -2) {
        //             $bobot[$item] = 5;
        //         } elseif ($gap[$item] == 3) {
        //             $bobot[$item] = 4;
        //         } elseif ($gap[$item] == -3) {
        //             $bobot[$item] = 2;
        //         } elseif ($gap[$item] == 4) {
        //             $bobot[$item] = 1;
        //         } else {
        //             $bobot[$item] == 0;
        //         }
        //     }
        // }





        // return $cf;




        // Mail::to($retailer->email)->send(new NotifikasiPendaftaran());
        // return redirect('/')->with('success', 'Pendaftaran berhasil dilakukan. Silahkan cek email anda.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $retailer = Retailer::find($id);
        return view(
            'retailer.retailer',
            [
                'profiles' => $retailer->retailerProfiles,
                'retailer_id' => $retailer->id
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $retailer = Retailer::find($id);
        return view('retailer.edit', [
            'retailer' => $retailer,
            'user' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Retailer::find($id)->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'location' => $request->location
        ]);
        return redirect('retailer');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
