<?php

namespace App\Http\Controllers;

use App\Models\Retailer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return view('/dashboard.index', [
            'retailers' => Retailer::all(),
        ]);
    }
}
