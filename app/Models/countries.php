<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_name',
        'country_desc',
        'country_status',
        'country_slug',
        'keywords_ceo',

    ];

    public function movie() {
        return $this->hasMany(movies::class);
    }
}
