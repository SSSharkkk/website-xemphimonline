<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_name',
        'genre_desc',
        'genre_status',
        'genre_slug',
        'keywords_ceo',

    ];

    public function movie() {
        return $this->hasMany(movies::class);
    }
}
