<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class episodes extends Model
{
    use HasFactory;

    protected $fillable = [
        'film',
        'movie_id',
        'episode',
    ];
    public function movie() {
        return $this->belongsTo(movies::class,'movie_id');
    }
}
