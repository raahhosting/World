<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Download;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $downloads = Download::inRandomOrder()->take(8)->get();
      $categories = Category::all();
        return view('home')->with([
          'downloads'=>$downloads,
          'categories'=>$categories,
        ]);
    }
}
