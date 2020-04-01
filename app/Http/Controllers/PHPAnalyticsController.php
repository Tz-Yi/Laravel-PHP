<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PHPAnalytics as Analytics;

class PHPAnalyticsController extends Controller
{
    function fetch() {
      $init = Analytics::where('pageName', 'home');
      if $init === null {
        Analytics::insert(array('pageName' => 'home'));
      } else {
        $homePage = Analytics::where('pageName', 'home');
        $curNum = ($homePage->counter)++
        Analytics::where('pageName', 'home')
                      ->('counter', $curNum);
      }
      return View::make('layouts.footer', ['counter', $curNum]);
    }

}
