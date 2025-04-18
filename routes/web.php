<?php

use App\Http\Controllers\SearchController;
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
  return view('welcome');
})->name('home');

Route::resource('users', UsersController::class);

Route::post('/create/dummy', [UsersController::class, 'created_dummy_users'])
  ->name('users.create.dummy');

Route::post('/create/fake', [UsersController::class, 'created_fake_users'])
  ->name('users.create.fake');

Route::delete('/delete/users', [UsersController::class, 'delete_all'])
  ->name('users.deleteall');

Route::post('/users/search', [SearchController::class, 'index'])
  ->name('users.search');

/**
 * 1- Will use the timezone from config/app.php
 * 'timezone' => env('TIME_ZONE', 'UTC'),
 * 2- Add TIME_ZONE='Africa/Cairo' in /.env file
 */
Route::get('/time', function () {

  $now = now(); // Laravel helper
  // dd($now);
  // echo  $carbon = Carbon::now(); // Direct Carbon usage
  return Carbon::now();
});
