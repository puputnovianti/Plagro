<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Factor;
use App\Models\Profile;
use App\Models\Retailer;
use App\Models\RetailerProfile;
use App\Models\RetailerProfileDitail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'retailer.index'
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
        $retailer = Retailer::create([
            'user_id' => $request->user_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'location' => $request->location
        ]);

        foreach ($retailer->id as $key) {
            $dataSave = [
                'retailer_id' => $retailer->id[$key],
                'profile_id' => $request->profile_id[$key],
            ];
            DB::table('retailer_profiles')->insert($dataSave);

            // foreach ($request->profile_id as $key) {
            //     $dataSave = [
            //         'profile_id' => $request->profile_id[$key],
            //         'user_id' => $request->user_id[$key],
            //     ];
            //     DB::table('retailer_profile_ditails')->insert($dataSave);
        }


        return dd($dataSave);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $user = User::find($id);
        return view(
            'retailer.index',
            [
                'name' => $user->name,
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
        //
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
        //
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
