<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       if (Auth::check()) {
        $list = categories::all();

        return view('dashboard.category.list',compact('list'));
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
       
        return view('dashboard.category.add');
        }else {
            
         return redirect(URL::to('/'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        categories::create($request->all());

        return redirect()->back();
    }

    public function status_up(Request $request) {
        $data = $request->all();
        $status = categories::find($data['id']);
        $status->category_status = $data['category_status'];
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
            
             $edit =  categories::where('id',$id)->get();
        
             return view('dashboard.category.update', compact('edit'));
            
        }else {
                
             return redirect(URL::to('/'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        categories::find($id)->update($request->all());
        
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        categories::find($id)->delete();

        return redirect()->back();
    }
}
