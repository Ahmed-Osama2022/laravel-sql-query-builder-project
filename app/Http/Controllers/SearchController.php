<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
  /**
   * Search in the users by
   */
  public function index(Request $request)
  {

    $search_data = $request->except(['_token']);
    // dd($search_data['search']);

    // $query =  DB::table('users')->whereAll(
    //   [
    //     'name',
    //     'email'
    //   ],
    //   'LIKE',

    // )->get();

    $searchColumns = ['name', 'email'];
    $searchTerm = $search_data['search'];

    $users = DB::table('users')
      // ->where('active', true)
      ->whereAny(
        $searchColumns,
        'LIKE',
        '%' .  $searchTerm . '%'
      )->get();  // Wildcards on both sides)



    $title = 'Search results';
    // return $users;
    return view('users.index', compact(['users', 'title']));

    // dd($request->search());
  }
}
