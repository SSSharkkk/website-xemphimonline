<?php

namespace App\Http\Controllers;

use App\Models\countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;



class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
       
            $list = countries::all();
    
            return view('dashboard.country.list',compact('list'));
           
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
       
            return view('dashboard.country.add');
           
        }else {
                
             return redirect(URL::to('/'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        countries::create($request->all());

        return redirect()->back();
    }

    public function country_up(Request $request) {
        $data = $request->all();
        $status = countries::find($data['id']);
        $status->country_status = $data['country_status'];
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
       
            $edit =  countries::where('id',$id)->get();
    
            return view('dashboard.country.update', compact('edit'));
           
        }else {
                
             return redirect(URL::to('/'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        countries::find($id)->update($request->all());
        
        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        countries::find($id)->delete();

        return redirect()->back();
    }
}
