<?php

namespace App\Http\Controllers;

use App\Models\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('admin');

        $jmlretailer = Retailer::select(DB::raw("CAST(COUNT(id) as int) as jmlretailer"))->GroupBy(DB::raw("Month(created_at)"))->pluck('jmlretailer');

        $bulan = Retailer::select(DB::raw("MONTHNAME(created_at) as bulan"))->GroupBy(DB::raw("MONTHNAME(created_at)"))->pluck('bulan');

        return view('/dashboard.index', compact('jmlretailer', 'bulan'));
    }
}
