<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_desc',
        'category_status',
        'category_slug',
        'keywords_ceo',
    ];

    public function movie() {
        return $this->hasMany(movies::class);
    }
}
