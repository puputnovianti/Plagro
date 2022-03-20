<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Retailer;
use App\Models\RetailerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RetailerProfileController extends Controller
{

    public function edit($id)
    {
        $retailer = Retailer::find($id);
        return view('retailer.retailer_profile.edit', [
            'profiles' => $retailer,
            'criterias' => Criteria::all(),
            'retailer' => $retailer
        ]);
    }

    public function update(Request $request, $id)
    {
        $retailer = Retailer::find($id);
        for ($i = 0; $i < count($request->profile_id); $i++) {

            DB::table('retailer_profiles')
                ->where(
                    'retailer_id',
                    $retailer->id
                )->orWhere(
                    'criteria_id',
                    $request->criteria_id[$i]
                )
                ->update([
                    'profile_id' => $request->profile_id[$i],

                ]);
        }
        return redirect('retailer');
    }
}
