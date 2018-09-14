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



      if(request()->category){
        $downloads = Download::with('categories')->whereHas('categories',function($query){

          $query->where('slug',request()->category);
        })->get();
        $categories = Category::all();
          $topSoft = Download::inRandomOrder()->take(4)->get();

      }else{
        $downloads = Download::inRandomOrder()->take(8)->get();
        $topSoft = Download::inRandomOrder()->take(4)->get();
        $categories = Category::all();
        $categoryName = 'Featured';
      }
//dd($downloads);
      // $newSoftwares = Download::inRandomOrder()->take(3)->get();

        return view('software.all')->with([
          'downloads'=>$downloads,
            'categories'=>$categories,
            'topSoft'=>$topSoft,
          // 'newSoftwares'=>$newSoftwares,


          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('users.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //   'file'=>'require|file|max:20000'
        // ])
        //
        // $upload = $request->file('file');
        // $image = $request->file('image');
        // $path = $upload->store('public/storage');
        // $file = Download::create([
        //   'title'=>$upload->getClientOriginalName();
        //   'file'=>$path;
        // ])
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
          $related = Download::where('slug', '!=',$slug)->inRandomOrder()->take(4)->get();


        return view('software.softwares')->with([
'download'=>$download,
'related'=>$related,

          ]);
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
