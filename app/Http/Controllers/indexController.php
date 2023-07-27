<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\countries;
use App\Models\episodes;
use App\Models\genres;
use App\Models\movies;
use App\Models\times;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function home() {
       $title_ceo = 'Hay Xem Phim';
       $desc_ceo = 'Hay Xem phim online miễn phí chất lượng cao với phụ đề tiếng việt - thuyết minh - lồng tiếng.Hay Xem Phim Hay Mới có nhiều thể loại phim phong phú, đặc sắc. ';
       $keywords_ceo = 'Hay Xem Phim , phim mới , mọt phim , mot phim , phim moi hay , phim moi zzz , phim moiii, Phim mới , sextop , jav';

       $movie_hot = movies::with('genre')->where('movie_status',1)->orderBy('updated_at','desc')->get()->take(13);
       $movie_cinema =  movies::with('genre')->where('movie_status',1)->where('category_id',4)->orderBy('updated_at','desc')->get()->take(13);
       $movie_group = movies::with('genre')->where('movie_status',1)->where('category_id',1)->orderBy('updated_at','desc')->get()->take(13);
       $movie_alone = movies::with('genre')->where('movie_status',1)->where('category_id',3)->orderBy('updated_at','desc')->get()->take(13);
    

       return view('pages.homes',compact('movie_hot','movie_cinema','movie_group','movie_alone','title_ceo','desc_ceo','keywords_ceo'));
    }

    public function genre($id) {
        $genre = genres::where('genre_slug',$id)->first();
        $movie = movies::with('genre')->where('genre_id',$genre->id)->paginate(13);

        $title_ceo = 'Danh Sách Phim '.$genre->genre_name.' - HayXemPhim';
        $desc_ceo = $genre->genre_desc;
        $keywords_ceo = $genre->keywords_ceo;
        


        return view('pages.genre.movie',compact('genre','movie','title_ceo','desc_ceo','keywords_ceo'));
    }

    public function country($id) {
        $country = countries::where('country_slug',$id)->first();
        $movie = movies::with('country')->where('country_id',$country->id)->paginate(13);
       
        $title_ceo = 'Danh Sách Phim '.$country->country_name.' - HayXemPhim';
        $desc_ceo = $country->country_desc;
        $keywords_ceo = $country->keywords_ceo;


        return view('pages.country.movie',compact('country','movie','title_ceo','desc_ceo','keywords_ceo'));
    }

    public function year($id) {
        $year = times::where('times_slug',$id)->first();
        $movie = movies::with('year')->where('year_id',$year->id)->paginate(13);
       
        $title_ceo = 'Danh Sách Phim '.$year->times_name.' - HayXemPhim ';
        $desc_ceo = $year->times_desc;
        $keywords_ceo = $year->keywords_ceo;



        return view('pages.year.movie',compact('year','movie','title_ceo','desc_ceo','keywords_ceo'));
    }
    public function category($id) {
        $category = categories::where('category_slug',$id)->first();
        $movie = movies::with('category')->where('category_id',$category->id)->paginate(13);
       
        $title_ceo = 'Danh Sách Phim '.$category->category_name;
        $desc_ceo = $category->category_desc;
        $keywords_ceo = $category->keywords_ceo;


        return view('pages.category.movie',compact('category','movie','title_ceo','desc_ceo','keywords_ceo'));
    }
    public function details($id) {
        $movie = movies::with('genre')->where('movie_slug',$id)->first();

        $title_ceo = 'Phim '.$movie->movie_name.' Vietsub - HayXemPhim';
        $desc_ceo = $movie->movie_desc;
        $keywords_ceo = $movie->keywords_ceo;

        return view('pages.movie.details',compact('movie','title_ceo','desc_ceo','keywords_ceo'));
    }
    public function watch($id) {
        $movie = movies::with('genre')->where('movie_slug',$id)->first();
        $watch = movies::where('movie_slug',$id)->first();
        $episode = episodes::where('movie_id',$watch->id)->get();

        $title_ceo = 'Phim '.$movie->movie_name.' tập 1 vietsub - HayXemPhim';
        $desc_ceo = $movie->movie_desc;
        $keywords_ceo = $movie->keywords_ceo;
        
        return view('pages.movie.watch',compact('movie','episode','title_ceo','desc_ceo','keywords_ceo'));
    }

    public function episode($slug,$id) {
        $watch = movies::where('movie_slug',$slug)->first();
        $movie = movies::with('genre')->where('movie_slug',$slug)->first();
        $episode = episodes::where('movie_id',$watch->id)->get();
        $episode_movie = episodes::where('id',$id)->first();

        $title_ceo = 'Phim '.$movie->movie_name.' '.$episode_movie->episode.' vietsub - HayXemPhim';
        $desc_ceo = $movie->movie_desc;
        $keywords_ceo = $movie->keywords_ceo;


        return view('pages.movie.episode',compact('movie','episode','episode_movie','title_ceo','desc_ceo','keywords_ceo'));
    }

    public function search(Request $request) {
        $key = $request->tu_khoa;
        
        $movie = movies::where('movie_name','like','%'.$key.'%')->get();

        return view('pages.movie.search',compact('movie','key'));
    }

    public function orders(Request $request) {
        $genre = $request->genre;
        $country = $request->country;
        $year = $request->year;
        $cate = $request->category;

        $genre_1 = genres::where('genre_name',$genre)->first();
        $country_1 = countries::where('country_name',$country)->first();
        $year_1 = times::where('times_name',$year)->first();
        $cate_1 = categories::where('category_name',$cate)->first();
       
        if ($genre == '--Thể Loại--' &&  $country == '--Quốc Gia--'  &&  $year == '--Năm--'  &&  $cate == '--Danh Mục--') {

            return redirect()->back();
        }else if($genre &&  $country == '--Quốc Gia--'  &&  $year == '--Năm--'  &&  $cate == '--Danh Mục--') {
            $movie = movies::where('genre_id',$genre_1->id)->get();
            
            return view('pages.movie.orders',compact('movie'));
        }else if($genre == '--Thể Loại--' &&  $country  &&  $year == '--Năm--'  &&  $cate == '--Danh Mục--') {
            $movie = movies::where('country_id',$country_1->id)->get();
            
            return view('pages.movie.orders',compact('movie'));
        }else if($genre == '--Thể Loại--' &&  $country == '--Quốc Gia--'  &&  $year  &&  $cate == '--Danh Mục--') {
            $movie = movies::where('year_id',$year_1->id)->get();
            
            return view('pages.movie.orders',compact('movie'));
        }else if($genre == '--Thể Loại--' &&  $country == '--Quốc Gia--'  &&  $cate && $year == '--Năm--') {
            $movie = movies::where('category_id',$cate_1->id)->get();
            
            return view('pages.movie.orders',compact('movie'));
        }
        
    }
}
