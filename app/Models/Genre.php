<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = [
        'GenreName'
    ];

    public function films() {
        return $this->hasMany(Film::class, 'GenreID');
    }
}
