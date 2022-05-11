<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use App\Models\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('admin');

        $jmlretailer = Calculation::select(DB::raw("CAST(COUNT(id) as int) as jmlretailer"))->GroupBy(DB::raw("total_score"))->pluck('jmlretailer');

        $score = Calculation::select(DB::raw("total_score as score"))->GroupBy(DB::raw("total_score"))->pluck('score');

        $retailers = Retailer::orderBy('id', 'desc')->limit(6)->get();

        return view('/dashboard.index', compact('jmlretailer', 'score', 'retailers'));
    }
}
