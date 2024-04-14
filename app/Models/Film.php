<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'FilmName',
        'FilmSynopsis',
        'FilmDuration',
        'FilmReleaseDate',
        'FilmAgeRestriction',
        'FilmDirector',
        'FilmRating',
        'FilmLanguage',
        'FilmSubtitle',
        'FilmPoster',
        'FilmTrailer',
        'ShowDateID',
        'GenreID',
        'PlaceID'
    ];

    public function genres() {
        return $this->belongsTo(Genre::class, 'GenreID', 'id');
    }

    public function tickets() {
        return $this->hasMany(Ticket::class, 'TicketID');
    }

    public function places(){
        return $this->belongsToMany(Place::class, 'film_places', 'FilmID', 'PlaceID');
    }
}
