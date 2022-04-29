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

        $bobotsf = array(); //bobot nilai gap
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
        $calculation->cfactor = $ratacf;
        $calculation->sfactor = $ratasf;
        $calculation->total_score = $total;
        $calculation->save();


        Mail::to($retailer->email)->send(new NotifikasiPendaftaran());
        return redirect('/')->with('success', 'Pendaftaran berhasil dilakukan. Silahkan cek email anda.');
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
