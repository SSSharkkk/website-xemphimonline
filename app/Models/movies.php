<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_name',
        'movie_slug',
        'movie_desc',
        'movie_images',
        'resolution',
        'genre_id',
        'country_id',
        'year_id',
        'times',
        'age',
        'movie_status',
        'category_id',
        'traller',
        'film',
        'keywords_ceo',
    ];

    public function category() {
        return $this->belongsTo(categories::class, 'category_id');
    }
    public function genre() {
        return $this->belongsTo(genres::class,'genre_id');
    }
    public function country() {
        return $this->belongsTo(countries::class, 'country_id');
    }
    public function year() {
        return $this->belongsTo(times::class, 'year_id');
    }
    public function episode() {
        return $this->hasMany(episodes::class);
    }
}
