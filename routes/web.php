<?php

use App\Http\Controllers\UsersController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

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
  return view('layouts.master');
});

Route::resource('users', UsersController::class);


Route::get('/time', function () {
  /**
   * 1- Will use the timezone from config/app.php
   * 'timezone' => env('TIME_ZONE', 'UTC'),
   * 2- Add TIME_ZONE='Africa/Cairo' in /.env file
   */
  $now = now(); // Laravel helper
  // dd($now);
  // echo  $carbon = Carbon::now(); // Direct Carbon usage
  return Carbon::now();
});
