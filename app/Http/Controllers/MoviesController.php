<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
     public function index()
    {
        $movies = Movie::latest()->paginate(4);
        return view('movies.index',compact('movies'))->with('i',(request()->input('page',1)-1)*4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = ['Action','Comedy','Horrer','Biopic','Drama'];
        return view('movies.create',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'required',
        'genre'=>'required',
        'poster'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',

    ]);
        $imageName =  '';
        if($request->poster){
           $imageName = time().'.'.$request->poster->extension();
           $request->poster->move(public_path('uploads'), $imageName);
        }

        $data = new Movie;
        $data->title = $request->title;
        $data->genre = $request->genre;
        $data->release_year = $request->release_year;
        $data->poster = $imageName;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        
        return view('movies.show',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
         $genres = ['Action','Comedy','Horrer','Biopic','Drama'];
         return view('movies.edit',compact('movie','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
         'title'=>'required',
         'genre'=>'required',
         'release_year'=>'required',
        ]);

        $imageName =  '';
        if($request->poster){
           $imageName = time().'.'.$request->poster->extension();
           $request->poster->move(public_path('uploads'), $imageName);
           $movie->poster=$imageName;
        }else
          $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->release_year = $request->release_year;
        $movie->update();
        return redirect()->route('movies.index')->with('message','Data is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('message','Selected Record is deleted successfully');
    }
}
