<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdealProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\RetailerProfileController;
use App\Mail\SendMail;
use App\Mail\SendMailMarkdown;
use App\Models\IdealProfile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;




// Route::get('/markdown', function () {
//     Mail::to('ekapuput44@gmail.com')->send(new SendMailMarkdown());
//     return view('home');
// });

Route::get('dashboard/categories', [CategoryController::class, 'index'])->middleware('admin');
Route::get('dashboard/categories/create', [CategoryController::class, 'create'])->middleware('admin');
Route::post('dashboard/categories', [CategoryController::class, 'store'])->middleware('admin');
Route::get('dashboard/categories/{id}/edit', [CategoryController::class, 'edit'])->middleware('admin');
Route::put('dashboard/categories/{id}', [CategoryController::class, 'update'])->middleware('admin');
Route::delete('dashboard/categories/{id}', [CategoryController::class, 'destroy'])->middleware('admin');

Route::get('dashboard/criterias', [CriteriaController::class, 'index'])->middleware('admin');
Route::get('dashboard/criterias/create', [CriteriaController::class, 'create'])->middleware('admin');
Route::post('dashboard/criterias', [CriteriaController::class, 'store']);
Route::get('dashboard/criterias/{criteria:id}', [CriteriaController::class, 'show'])->middleware('admin');


Route::post('dashboard/criterias/criteria', [CriteriaController::class, 'storeprofile']);
// Route::post('dashboard/criterias/criteria', [CriteriaController::class, 'storeidealprofile']);

Route::get('dashboard/ideal_profile/{criteria:id}', [IdealProfileController::class, 'show'])->middleware('admin');
Route::post('dashboard/ideal_profile/{id}', [IdealProfileController::class, 'store'])->middleware('admin');
Route::get('dashboard/ideal_profile/{id}/edit', [IdealProfileController::class, 'edit'])->middleware('admin');
Route::put('dashboard/ideal_profile/{id}', [IdealProfileController::class, 'update'])->middleware('admin');


Route::get('dashboard/criterias/{id}/edit', [CriteriaController::class, 'edit'])->middleware('admin');
Route::put('dashboard/criterias/{id}', [CriteriaController::class, 'update'])->middleware('admin');
Route::delete('dashboard/criterias/{id}', [CriteriaController::class, 'destroy'])->middleware('admin');

Route::get('dashboard/factors', [FactorController::class, 'index'])->middleware('admin');
Route::get('dashboard/factors/{factor:id}', [FactorController::class, 'show'])->middleware('admin');

Route::get('dashboard/profiles', [ProfileController::class, 'index'])->middleware('admin');
Route::get('dashboard/profiles/create', [ProfileController::class, 'create'])->middleware('admin');
Route::post('dashboard/profiles', [ProfileController::class, 'store'])->middleware('admin');
Route::get('dashboard/profiles/{profile:id}', [ProfileController::class, 'show'])->middleware('admin');
Route::get('dashboard/profiles/{id}/edit', [ProfileController::class, 'edit'])->middleware('admin');
Route::put('dashboard/profiles/{id}', [ProfileController::class, 'update'])->middleware('admin');
Route::delete('dashboard/profiles/{id}', [ProfileController::class, 'destroy'])->middleware('admin');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('admin');

// Route::resource('/retailer', RetailerController::class)->middleware('retailer');
// Route::get('retailer', [RetailerController::class, 'index'])->middleware('retailer');
Route::get('/', [RetailerController::class, 'index']);
// Route::get('/', [RetailerController::class, 'create']);
Route::post('/', [RetailerController::class, 'store']);

// Route::get('retailer/{id}/edit', [RetailerController::class, 'edit']);
// Route::put('retailer/{id}', [RetailerController::class, 'update']);
// Route::get('/retailer/retailer/{retailer:id}', [RetailerController::class, 'show']);



Route::get('retailer/retailer_profile/{id}/edit', [RetailerProfileController::class, 'edit']);
Route::put('retailer/retailer_profile/{id}', [RetailerProfileController::class, 'update']);



Route::get('dashboard/ideal_profile', [IdealProfileController::class, 'index'])->middleware('admin');

Route::get('dashboard/calculation', [CalculationController::class, 'index'])->middleware('admin');
Route::get('dashboard/calculation/{id}', [CalculationController::class, 'show'])->middleware('admin');
Route::get('dashboard/calculation/create', [CalculationController::class, 'create'])->middleware('admin');
