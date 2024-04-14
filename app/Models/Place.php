<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'PlaceName',
        'PlaceAddress',
        'TeatreID'
    ];

    public function films(){
        return $this->belongsToMany(Film::class, 'film_places', 'FilmID', 'PlaceID');
    }

    public function theatres(){
        return $this->hasMany(Theatre::class, 'TheatreID', 'id');
    }
}
