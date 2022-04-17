<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\IdealProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class IdealProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.ideal_profile.index', [
            'ideal_profiles' => IdealProfile::orderBy('id')->get(),
            'profile' => Profile::orderBy('id')->get(),
            'criteria' => Criteria::orderBy('id')->get(),
        ]);
    }

    public function show($id)
    {
        $criteria = Criteria::find($id);
        return view('dashboard.ideal_profile.create', [
            'profiles' => $criteria->profiles,
            'factor_id' => $criteria->factor_id,
            'criteria_id' => $criteria->id,
            'criteria_name' => $criteria->name,
        ]);
    }

    public function store(Request $request)
    {
        IdealProfile::create([
            'factor_id' => $request->factor_id,
            'criteria_id' => $request->criteria_id,
            'profile_id' => $request->profile_id
        ]);
        return redirect('dashboard/ideal_profile');
    }

    public function edit($id)
    {
        $criteria = Criteria::find($id);
        return view('dashboard.ideal_profile.edit', [
            'criteria' => $criteria,
            'profiles' => Profile::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        IdealProfile::find($id)->update([
            'criteria_id' => $request->criteria_id,
            'profile_id' => $request->profile_id
        ]);
        return redirect('dashboard/ideal_profile');
    }
}
