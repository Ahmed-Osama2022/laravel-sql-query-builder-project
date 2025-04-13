<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    /**
     * Create DUMMY_DATA for table users
     */

    $users = Storage::json('public/users.json');

    $now = now();
    // DB::table('users')->truncate();
    // die();

    // foreach ($users as $user) {
    //   DB::table('users')->insert([
    //     'name' => $user['name'],
    //     'email' => $user['email'],
    //     'password' => Hash::make($user['address']['zipcode']),
    //     'password' => Hash::make($user['address']['zipcode']),
    //     'created_at' => Carbon::now()->addMinutes(5),
    //     'updated_at' => Carbon::now()->addHour()
    //   ]);
    // }



    $users = DB::table('users')->get();
    // dd($users);

    return view('users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    /**
     * There is a different methods
     */

    // NOTE: But this will force us to write the query!
    // DB::table('users')->select('And make the query here');

    $user =  DB::table('users')->find($id);
    // dd($user);

    return view('users.show', compact('user'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
