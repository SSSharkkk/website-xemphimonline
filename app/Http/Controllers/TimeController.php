<?php

namespace App\Http\Controllers;

use App\Models\times;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
       
            $list = times::all();
    
            return view('dashboard.time.list',compact('list'));
           
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
       
            return view('dashboard.time.add');
           
        }else {
                
             return redirect(URL::to('/'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        times::create($request->all());

        return redirect()->back();
    }

    public function time_up(Request $request) {
        $data = $request->all();
        $status = times::find($data['id']);
        $status->times_status = $data['times_status'];
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
       
            $edit =  times::where('id',$id)->get();
    
            return view('dashboard.time.update', compact('edit'));
           
        }else {
                
             return redirect(URL::to('/'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        times::find($id)->update($request->all());
        
        return redirect()->route('time.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        times::find($id)->delete();

        return redirect()->back();
    }
}
