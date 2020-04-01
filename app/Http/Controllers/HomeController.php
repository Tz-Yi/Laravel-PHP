<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PHPAnalytics as Analytics;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $init = DB::table('analytics')->where('pageName', "home");
      if (!$init->count()) {
        DB::table('analytics')->insert(array('pageName' => "home"));
      }
      $homePage = DB::table('analytics')->where('pageName', "home")->first();
      $curNum = $homePage->counter;
      $curNum = $curNum + 1;
      DB::table('analytics')->where('pageName', 'home')
                    ->update(array('counter' => $curNum));
      return view('pages.profile')->with('counter', $curNum);
    }
}
