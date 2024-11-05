<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'TicketPrice',
        'TicketExpirationDate',
        'FilmID'
    ];

    public function films() {
        return $this->belongsTo(Film::class, 'FilmID', 'id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'transactions', 'UserID', 'TicketID');
    }
}
