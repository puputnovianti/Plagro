<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RetailerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

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

Route::resource('/dashboard', AdminController::class);

Route::resource('/retailer', RetailerController::class)->middleware('retailer');
