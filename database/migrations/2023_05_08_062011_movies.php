<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('movie_name');
            $table->string('movie_slug');
            $table->string('movie_desc');
            $table->string('movie_images');
            $table->integer('resolution');
            $table->integer('genre_id');
            $table->integer('country_id');
            $table->integer('year_id');
            $table->integer('traller');
            $table->integer('times');
            $table->integer('age');
            $table->integer('movie_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
