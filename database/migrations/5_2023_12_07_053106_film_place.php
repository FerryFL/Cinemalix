<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('FilmID');
            $table->unsignedBigInteger('PlaceID');
            $table->timestamps();

            $table->foreign('FilmID')->references('id')->on('films')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('PlaceID')->references('id')->on('places')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_places');
    }
};
