<?php

namespace App\Http\Controllers;


use App\Models\Criteria;
use App\Models\Factor;
use App\Models\IdealProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {

        return view('dashboard.criterias.index', [
            'criterias' => Criteria::with(['profiles'])->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.criterias.create', [
            'factors' => Factor::all()
        ]);
    }
    public function store(Request $request)
    {
        $criteria = Criteria::create([
            'name' => $request->name,
            'factor_id' => $request->factor_id,
        ]);

        IdealProfile::create([
            'criteria_id' => $criteria->id,
        ]);


        return redirect('dashboard/criterias');
    }




    public function show($id)
    {
        $criteria = Criteria::find($id);
        return view(
            'dashboard.criterias.criteria',
            [
                'profiles' => $criteria->profiles,
                'criteria_id' => $criteria->id,
                'criteria_name' => $criteria->name,
                'factors' => $criteria->factor,


            ]
        );
    }


    public function storeprofile(Request $request)
    {
        Profile::create([
            'criteria_id' => $request->criteria_id,
            'name' => $request->name,
            'score' => $request->score,
        ]);

        return redirect()->back();
    }





    public function edit($id)
    {
        $criteria = Criteria::find($id);
        return view('dashboard.criterias.edit', [
            'criteria' => $criteria,
            'factors' => Factor::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        Criteria::find($id)->update([
            'name' => $request->name,
            'factor_id' => $request->factor_id,
        ]);
        return redirect('dashboard/criterias');
    }

    public function destroy($id)
    {
        Criteria::find($id)->delete();
        return back();
    }
}
