<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\countries;
use App\Models\genres;
use App\Models\movies;
use App\Models\times;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
       
            $list = movies::with('category')->orderBy('id','desc')->get();
            $category = categories::all();
            $genre = genres::all();
            $country = countries::all();
            $year = times::all();
    
            return view('dashboard.movies.list',compact('list','category','genre','country','year'));
           
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
       
            $genre = genres::all();
            $country = countries::all();
            $year = times::all();
            $category = categories::all();
    
            return view('dashboard.movies.add',compact('genre','country','year','category'));
           
        }else {
                
             return redirect(URL::to('/'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data =  $request->all();
        $input = $request->file('movie_images');
        if ($input) {
            $get_name_image = $input->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$input->getClientOriginalExtension();
            $input->move('images/uploads/',$new_image);
            $data['movie_images'] = $new_image;
            movies::create($data);


            return redirect()->back();

        }


        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     */

    public function movie_up(Request $request) {
        $data = $request->all();
        $status = movies::find($data['id']);
        $status->movie_status = $data['movie_status'];
        $status->save();
    }

    public function movie_cate_up(Request $request) {
        $data = $request->all();
        $status = movies::find($data['id']);
        $status->category_id = $data['category'];
        $status->save();
    }
    public function movie_genre_up(Request $request) {
        $data = $request->all();
        $status = movies::find($data['id']);
        $status->genre_id = $data['genre'];
        $status->save();
    }
    public function movie_country_up(Request $request) {
        $data = $request->all();
        $status = movies::find($data['id']);
        $status->country_id = $data['country'];
        $status->save();
    }
    public function movie_year_up(Request $request) {
        $data = $request->all();
        $status = movies::find($data['id']);
        $status->year_id = $data['year'];
        $status->save();
    }
    public function movie_age_up(Request $request) {
        $data = $request->all();
        $status = movies::find($data['id']);
        $status->age = $data['age'];
        $status->save();
    }
    public function movie_resolution_up(Request $request) {
        $data = $request->all();
        $status = movies::find($data['id']);
        $status->resolution = $data['resolution'];
        $status->save();
    }
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
       
            $edit = movies::where('id',$id)->get();
      
            return view('dashboard.movies.update',compact('edit'));
           
        }else {
                
             return redirect(URL::to('/'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =  $request->all();
        $input = $request->file('movie_images');
        if ($input) {
            $get_name_image = $input->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$input->getClientOriginalExtension();
            $input->move('images/uploads/',$new_image);
            $data['movie_images'] = $new_image;
            movies::find($id)->update($data);


            return redirect(route('movie.index'));

        }
        movies::find($id)->update($data);


        return Redirect(route('movie.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = movies::find($id);
        if (file_exists('images/uploads/'.$movie->movie_images)) {
            unlink('images/uploads/'.$movie->movie_images);
        } 
        $movie->delete();


        return Redirect(route('movie.index'));
    }
    
}
