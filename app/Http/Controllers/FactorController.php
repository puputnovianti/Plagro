<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    public function index()
    {

        return view('factors.index', [
            'factors' => Factor::orderBy('id')->get()
        ]);
    }


    public function show($id)
    {
        $factor = Factor::find($id);
        return view(
            'factors.factor',
            [
                'criterias' => $factor->criteria,
                'factor' => $factor->name

            ]
        );
    }
}
