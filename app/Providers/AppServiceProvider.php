<?php

namespace App\Providers;

use App\Models\categories;
use App\Models\countries;
use App\Models\genres;
use App\Models\movies;
use App\Models\times;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $category_header = categories::where('category_status',1)->get();
        $genre_header = genres::where('genre_status',1)->get();
        $country_header = countries::where('country_status',1)->get();
        $time_header = times::where('times_status',1)->get();
        $movie_new = movies::orderBy('updated_at','desc')->take(6)->get();
        // $comment = comment::with('product')->where('user_id',1)->where('status',1)->get();
        // $chat = chat::where('from',1)->get();

        View::share([
            'category_header'=>$category_header,
            'genre_header'=>$genre_header,
            'country_header'=>$country_header,
            'time_header'=>$time_header,
            'movie_new'=>$movie_new,
           
        ]);
    }
}
