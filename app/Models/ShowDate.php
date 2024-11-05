<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'ShowDate',
        'ShowTime'
    ];
}
