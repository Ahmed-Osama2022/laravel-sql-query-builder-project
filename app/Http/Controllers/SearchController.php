<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
  public bool $paginator_status;


  /**
   * Implement the search functionality
   */
  public function search_users(Request $request)
  {
    $search_data = $request->except(['_token']);
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
    $paginator_status = false;
    // return $users;
    return view('users.index', compact(['users', 'title', 'paginator_status']));
  }
}
