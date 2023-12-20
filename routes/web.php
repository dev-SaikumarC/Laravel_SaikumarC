<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('login');
});

Route::post('/login', [RegisterController::class, 'login']);

Route::resource('/register', RegisterController::class);
Route::post('/RegisterProcess', [RegisterController::class, 'store']);

// Route::post('/login', [RegisterController::class, 'login']);
Route::resource("/employee", EmployeeController::class)->middleware('customauth');

Route::resource('/createProfile', ProfileController::class)->middleware('customauth');;
Route::post('/profileCreate', [ProfileController::class, 'store']);

Route::get('/updateProfile', [ProfileController::class, 'edit'])->middleware('customauth');;
Route::post('/profileUpdate', [ProfileController::class, 'update']);

Route::get('/logout', [RegisterController::class, 'logout']);
