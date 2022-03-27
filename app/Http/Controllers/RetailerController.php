<?php

namespace App\Http\Controllers;

use App\Mail\NotifikasiPendaftaran;
use App\Models\Criteria;
use App\Models\Calculation;
use App\Models\Profile;
use App\Models\Retailer;
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

        if (is_countable($data['profile_id']) && count($data['profile_id']) > 0) {
            foreach ($data['profile_id'] as $item => $value) {
                $data2 = array(
                    'retailer_id' => $retailer->id,
                    'criteria_id' => $data['criteria_id'][$item],
                    'profile_id' => $data['profile_id'][$item],

                );
                RetailerProfile::create($data2);
            }
        }




        Mail::to($retailer->email)->send(new NotifikasiPendaftaran());
        return redirect('/')->with('success', 'Pendaftaran berhasil dilakukan. silahkan cek email anda.');
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
