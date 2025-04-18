<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UsersUpdateRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Faker\Factory;


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

    /**
     * This is the regular query
     */
    // $users = DB::table('users')->get();

    /**
     * Or you could use this advanced
     * From Lesson => 18
     * 18. Using advanced select DB queries
     */
    // $users = DB::table('users')->select('name')->orderBy('name', 'asc')->get();
    // $users = DB::table('users')->orderBy('id', 'asc')->get();
    // $users = DB::table('users')->orderBy('id', 'desc')->get(); // default is 'asc'
    $users = DB::table('users')->orderBy('id', 'desc')->get();

    // $users = DB::table('users')->whereIn('id', [3, 5, 7])->get();

    // $query = DB::table('users')->select('email');

    // $users  = $query->addSelect('id')->get();

    // | ================================================================================= |
    // dd($users);
    return view('users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(UsersStoreRequest $request)
  {
    // This returns all the data from the request...
    $inputs = $request->all();
    /**
     * Let's hash the password first!
     */

    // $password = '';
    // foreach ($inputs as $key => $input) {
    //   if ($key === 'password') {
    //     $password =  Hash::make($input);
    //     // dd($password);
    //   }
    // }

    // From Chat-GPT
    $allData = collect($request->all())
      ->map(function ($input, $key) {
        if ($key === 'password') {
          return Hash::make($input);
        }
        return $input;
      })
      ->except(['_token', '_method', 'password_confirmation'])
      ->merge([
        'created_at' => Carbon::now()
      ])
      ->toArray();

    // $allData = collect($request->all())
    //   ->except(['_token', '_method', 'password_confirmation'])
    //   ->merge([
    //     'created_at' => Carbon::now()
    //   ])
    //   ->toArray();

    /**
     * Insrting data into DB
     */
    DB::table('users')
      ->insert($allData);

    return redirect()->route('users.index');
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

    $user = DB::table('users')->find($id);
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
  public function update(UsersUpdateRequest $request, string $id)
  {

    // This returns all the data from the request...
    $inputs = $request->all();

    // dd($inputs);
    // This returns only the data that passes the validation...
    // $allData = $request->safe();
    /**
     * Let's combine the two methods and merge them with others to see the to output what we want
     */
    // $allData = $request->safe()->merge($inputs)->except(['_token', '_method']);

    // But here I want => this approach
    // $allData = $request->all()->except(['_token', '_method']); // Can't be Done ('Call to a member function except() on array')
    // dd($request->collect()->except(['_token', '_method']));

    // From Chat-GPT
    $allData = collect($request->all())->except(['_token', '_method', 'password_confirmation'])->toArray();

    // dd($allData);

    /**
     * Insrting data into DB
     */
    DB::table('users')
      ->where('id', $id)
      ->update($allData);

    // return 'Done!';

    return redirect()->route('users.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // DB::table('users')->find($id)->delete(); // BUG: forget '->where()'
    DB::table('users')
      ->where('id', $id)
      ->delete();

    return redirect()->back();
    // return 'Delete';
  }

  /**
   * Create Dummy Data in a database table
   */
  public function created_dummy_users(Request $request)
  {
    $users = Storage::json('public/users.json');
    $time = Carbon::now();
    foreach ($users as $user) {
      DB::table('users')->insert([
        'name' => $user['name'],
        'email' => $user['email'],
        'password' => Hash::make($user['email']),
        'created_at' => $time->addHour(),
        'updated_at' => $time->addHour(),
      ]);
    }
    return redirect()->back();
  }

  /**
   * Create Dummy Data in a database table
   */
  public function created_fake_users(Request $request)
  {
    // use the factory to create a Faker\Generator instance
    $faker = Factory::create();
    // dd(now());

    for ($i = 0; $i < 50; $i++) {
      DB::table('users')->insert([
        'name' => $faker->name(),
        'email' => $faker->email(),
        'password' => Hash::make($faker->password(8)),
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
    // dd();
    return redirect()->back();
  }
  /**
   * Deleteing all the data in table for resource
   */
  public function delete_all(Request $request)
  {
    DB::table('users')->truncate();

    return redirect()->back();
  }
}
