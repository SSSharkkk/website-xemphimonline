<?php

namespace App\Http\Controllers;

use App\Models\genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
       
            $list = genres::all();
    
            return view('dashboard.genre.list',compact('list'));
           
        }else {
                
             return redirect(URL::to('/'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
       
            return view('dashboard.genre.add');
           
        }else {
                
             return redirect(URL::to('/'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        genres::create($request->all());

        return redirect()->back();
    }

    public function genre_up(Request $request) {
        $data = $request->all();
        $status = genres::find($data['id']);
        $status->genre_status = $data['genre_status'];
        $status->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
      
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::check()) {
       
            $edit =  genres::where('id',$id)->get();
    
            return view('dashboard.genre.update', compact('edit'));
           
        }else {
                
             return redirect(URL::to('/'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        genres::find($id)->update($request->all());
        
        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        genres::find($id)->delete();

        return redirect()->back();
    }
}
