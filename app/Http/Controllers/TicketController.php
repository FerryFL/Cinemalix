<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Place;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function showTicketView($filmID){
        $films = Film::find($filmID);
        return view('Ticket.Create_Ticket')->with('film', $films);
    }

    public function viewSeat(){

        return view('Additional.Seat_Theater');
    }

    public function pickSeat($filmID, $placeID){
        $films = Film::find($filmID);
        $places = Place::find($placeID);

        return view('Seat_Theater')->with('film', $films)->with('place', $places);
    }
}
