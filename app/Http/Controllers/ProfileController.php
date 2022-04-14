<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Criteria;

class ProfileController extends Controller
{
    public function index()
    {

        return view('dashboard.profiles.index', [
            'profiles' => Profile::orderBy('id')->get()

        ]);
    }

    public function create()
    {
        return view('dashboard.profiles.create', [
            'criterias' => Criteria::all()
        ]);
    }
    public function store(Request $request)
    {
        Profile::create([
            'name' => $request->name,
            'criteria_id' => $request->criteria_id,
            'score' => $request->score,
        ]);
        return redirect('dashboard/profiles');
    }

    // public function show($id)
    // {
    //     $profile = Profile::find($id);
    //     return view(
    //         'profiles.profile',
    //         [
    //             'criteria' => $profile->criteria,
    //             'profile' => $profile->name,
    //             'score' => $profile->score

    //         ]
    //     );
    // }

    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('dashboard.profiles.edit', [
            'profile' => $profile,
            'score' => $profile->score,
            'criterias' => Criteria::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        Profile::find($id)->update([
            'name' => $request->name,
            'score' => $request->score,
            'criteria_id' => $request->criteria_id,
        ]);
        return redirect('dashboard/profiles')->with('edit', 'Data berhasil diubah.');
    }

    public function destroy($id)
    {
        Profile::find($id)->delete();
        return back()->with('delete', 'Data berhasil dihapus.');
    }
}
