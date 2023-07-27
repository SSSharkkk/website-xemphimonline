<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class times extends Model
{
    use HasFactory;

    protected $fillable = [
        'times_name',
        'times_desc',
        'times_status',
        'times_slug',
        'keywords_ceo',
    ];

    public function movie() {
        return $this->hasMany(movies::class);
    }
}
