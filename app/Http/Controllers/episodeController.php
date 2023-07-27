<?php

namespace App\Http\Controllers;

use App\Models\episodes;
use App\Models\movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class episodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {   
        if (Auth::check()) {
       
            $list = episodes::with('movie')->where('movie_id',$id)->orderBy('id','desc')->get();
            $movie = movies::where('id',$id)->first();
    
    
            return view('dashboard.episode.list', compact('list','movie'));
           
        }else {
                
             return redirect(URL::to('/'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (Auth::check()) {
       
            $movie = movies::where('id',$id)->first();
    
            return view('dashboard.episode.add',compact('movie'));
           
        }else {
                
             return redirect(URL::to('/'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        episodes::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::check()) {
       
            $edit = episodes::where('id',$id)->get();
    
    
            return view('dashboard.episode.update',compact('edit'));
           
        }else {
                
             return redirect(URL::to('/'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        episodes::find($id)->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        episodes::find($id)->delete();

        return redirect()->back();

    }
}
