<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    public function theatres(){
        return $this->belongsTo(Theatre::class, 'TheatreID', 'id');
    }
}
