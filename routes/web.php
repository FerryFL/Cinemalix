<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TicketController;
use App\Models\Film;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    $films = Film::all();
    return view('Dashboard')->with('film', $films);
})->name('dashboard');


Route::get('/support', function() {
    return view('Additional.Contact_Support');
})->name('contactSupport');

Route::get('/view-film-all', [FilmController::class, 'showFilmView'])->name('showFilmView');
Route::get('/detail-film/{id}', [FilmController::class, 'detailFilmView'])->name('detailFilmView');
Route::get('/seatview', [TicketController::class, 'viewSeat'])->name('viewSeat');

Route::middleware('admin')->group(function() {
    Route::get('/film/create', [FilmController::class, 'createFilmView'])->name('createFilmView');
    Route::post('/film/create', [FilmController::class, 'createFilm'])->name('createFilm');

    Route::get('/genre', [GenreController::class, 'showGenreView'])->name('showGenreView');
    Route::post('/genre/create', [GenreController::class, 'createGenre'])->name('createGenre');
    Route::delete('/genre/delete/{id}', [GenreController::class, 'deleteGenre'])->name('deleteGenre');
    Route::patch('/genre/edit/{id}', [GenreController::class, 'editGenre'])->name('editGenre');

    Route::post('/place/create/', [TicketController::class, 'createPlace'])->name('createPlace');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/ticket/{filmID}', [TicketController::class, 'showTicketView'])->name('showTicket');
    Route::get('/ticket/pickseat/{filmID}/{placeID}/{dateID}', [TicketController::class, 'pickSeat'])->name('pickSeat');

    Route::get('/reenter-code', [AuthController::class, 'reenterCodeView'])->name('reenterCodeView');
    Route::post('/reenter-code', [AuthController::class, 'reenterCode'])->name('reenterCode');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



});

Route::middleware('guest')->group(function() {
    Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/forgot-password', [AuthController::class, 'forgotPasswordView'])->name('forgotPasswordView');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');

    Route::get('/new-password/{id}', [AuthController::class, 'newPasswordView'])->name('newPasswordView');
    Route::patch('/new-password/{id}', [AuthController::class, 'newPassword'])->name('newPassword');
});

