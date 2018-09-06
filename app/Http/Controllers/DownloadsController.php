<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Download;
use App\Category;

use Cart;


class DownloadsController extends Controller
{



  public function search(Request $request){
      $request->validate([

        'query'=>'required|min:3',
      ]);
    $query = $request->input('query');

    // $downloads = Download::where('title','like',"%$query%")->get();
                           // ->orWhere('description', 'like', "%$query%");
    $downloads = Download::search($query)->get();

    return view('software.search-results')->with('downloads',$downloads);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



      if(request()->categories){
        $downloads = Download::with('category')->whereHas('category',function($query){
          $query->where('slug',request()->categories);

        })->get();
          $categories = Category::all();
          $categoryName=$categories->where('slug',$request()->categories)->first()->name;
      }else{
        $downloads = Download::inRandomOrder()->take(8)->get();
        $categories = Category::all();
        $categoryName = 'Featured';
      }


        return view('software.all')->with([
          'downloads'=>$downloads,
            'categories'=>$categories,

          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $download = Download::where('slug',$slug)->firstOrFail();


        return view('software.softwares')->with('download',$download);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
