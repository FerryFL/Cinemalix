<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    use HasFactory;

    public function seats(){
        return $this->hasMany(Seat::class, 'SeatID');
    }

    public function places(){
        return $this->belongsTo(Place::class, 'PlaceID');
    }
}
