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
use Illuminate\Support\Arr;
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
        $data = $request->all();
        $retailer = new Retailer;
        $retailer->user_id = $data['user_id'];
        $retailer->address = $data['address'];
        $retailer->phone = $data['phone'];
        $retailer->location = $data['location'];
        $retailer->save();

        if (is_countable($data['profile_id']) && count($data['profile_id']) > 0) {
            foreach ($data['profile_id'] as $item => $value) {
                $data2 = array(
                    'retailer_id' => $retailer->id,
                    'profile_id' => $data['profile_id'][$item],

                );
                RetailerProfile::create($data2);
            }
        }
        return redirect('retailer');
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
