<?php

namespace App\Http\Controllers;

use App\Mail\NotifikasiPendaftaran;
use App\Models\Criteria;
use App\Models\Calculation;
use App\Models\CriteriaImage;
use App\Models\IdealProfile;
use App\Models\Profile;
use App\Models\ProfileImage;
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
        // $is_addImages = Criteria::where('is_addImages', 1)->first()->name;
        // dd($is_addImages);
        return view(
            'home',
            [
                'criterias' => Criteria::where('is_addImages', 0)->get(),
                'criteriaImg' => Criteria::where('is_addImages', 1)->get(),
                'profiles' => Profile::all(),
                'ideal_profiles' => IdealProfile::all(),
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
        // $validateData = $request->validate([
        //     'image' => 'image'
        // ]);

        $data = $request->all();
        $retailer = new Retailer;
        $retailer->email = $data['email'];
        $retailer->name = $data['name'];
        $retailer->address = $data['address'];
        $retailer->location = $data['location'];
        $retailer->latitude = $data['latitude'];
        $retailer->longitude = $data['longitude'];
        $retailer->save();



        if (is_countable($data['retailer_profile_name']) && count($data['retailer_profile_name']) > 0) {
            foreach ($data['retailer_profile_name'] as $item => $value) {
                //get criteria name
                $criteriaId[$item] = Profile::where('name', $data['retailer_profile_name'][$item])->first()->criteria_id;
                $criteria_name[$item] = Criteria::where('id', $criteriaId[$item])->first()->name;
                //get factor id
                $factor_id[$item] = Criteria::where('id', $criteriaId[$item])->first()->factor_id;
                //get ideal profile name
                $profileId[$item] = IdealProfile::where('criteria_id', $criteriaId[$item])->first()->profile_id;
                $ideal_profile_name[$item] = Profile::where('id', $profileId[$item])->first()->name;
                //get ideal profile score
                $ideal_profile_score[$item] = Profile::where('id', $profileId[$item])->first()->score;
                //get retailer profile score
                $retailer_profile_score[$item] = Profile::where('name', $data['retailer_profile_name'][$item])->first()->score;

                $data2 = array(
                    'retailer_id' => $retailer->id,
                    'factor_id' => $factor_id[$item],
                    'criteria_name' => $criteria_name[$item],
                    'retailer_profile_name' => $data['retailer_profile_name'][$item],
                    'retailer_profile_score' => $retailer_profile_score[$item],
                    'ideal_profile_name' => $ideal_profile_name[$item],
                    'ideal_profile_score' => $ideal_profile_score[$item],
                    'gap' => $ideal_profile_score[$item] - $retailer_profile_score[$item],
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
        $calculation->cfactor = $totalcf;
        $calculation->sfactor = $totalsf;
        $calculation->total_score = $total;
        $calculation->save();

        //store images
        if ($request->hasfile('profile_image')) {
            $images = $request->file('profile_image');

            foreach ($images as $image) {
                $name = $retailer->id . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->storeAs('ProfileImages', $name);
                $dataImg = array(
                    'retailer_id' => $retailer->id,
                    'image_name' => $name,
                    // 'criteria_name' => $data['criteriaImg_name']

                );
                // dd($dataImg);
                ProfileImage::create($dataImg);
            }
        }


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
