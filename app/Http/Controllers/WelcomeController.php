<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use App\Article;
use App\Category;

class WelcomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $arts         = Article::orderBy('id', 'desc')->take(5)->get();
        $cats         = Category::all();
        $artsbycats   = Article::all();
        return view('welcome')->with('arts',$arts)
                              ->with('cats', $cats)
                              ->with('artsbycats', $artsbycats);
    }
    
    // Filtro del select
    public function loadcat(Request $request)
    {
        if($request->cid == 0) {
            $cats        = Category::all();
            $artsbycats  = Article::all(); 
            return view('loadcat')->with('cats', $cats)
                                  ->with('artsbycats', $artsbycats);
        } 
        else 
        {
            $cat        = Category::where('id', $request->cid)->first();
            $artsbycats = Article::where('category_id', $request->cid)->get();
            return view('loadcat')->with('cat', $cat)
                                  ->with('artsbycats', $artsbycats);
        } 
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
