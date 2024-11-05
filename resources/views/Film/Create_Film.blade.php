<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinemalix Create Film</title>
    <link rel="stylesheet" href="{{ asset('Style/Navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('Style/Film/Create_Film.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('dashboard') }}" class="left">
            <img src="{{ asset('Asset/Logo.png') }}" alt="Logo">
        </a>
        <div class="right">
            <ul>
                <div class="rightLeft">
                    <li><a href="{{ route('contactSupport') }}">Support</a></li>
                    <li><a href="{{ route('showFilmView') }}">Film</a></li>
                    @can('isAdmin')
                        <li><a href="{{ route('showGenreView') }}">Genre</a></li>
                    @endcan
                </div>
            </ul>
            <ul>
                <form method="POST" action="{{ route('logout') }}" class="rightRight">
                    @csrf
                    @can('isAdmin')
                        <li>
                            <a href="#">Admin ↓</a>
                            <ul class="dropdown">
                                <li><button type="submit">Log Out</button></li>
                            </ul>
                        </li>
                    @else
                        @auth
                            <li>
                                <a href="#">User ↓</a>
                                <ul class="dropdown">
                                    <li><button type="submit">Log Out</button></li>
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('loginView') }}">Login</a>
                            </li>
                        @endauth
                    @endcan
                </form>
            </ul>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="top">
                Upload Film
            </div>

            <form method="POST" action="{{ route('createFilm') }}" id="registerForm" enctype="multipart/form-data">
                @csrf
                <div class="middle">
                    <div class="middleLeft">
                        <div class="middleLeftTop">
                            <div class="input">
                                <div class="inputText">Film Title</div>
                                <div class="inputBox">
                                    <input type="text" name="FilmName" placeholder="Napoleon" id="filmTitleInput">
                                </div>
                                @error('FilmName')
                                    <div class="errorMessage">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="input">
                                <div class="inputText">Synopsis</div>
                                <textarea cols="50" rows="10" name="FilmSynopsis" placeholder="Terlatar tahun 1793, di masa era Revolusi Prancis terjadi. Napoleon akan berkisah tentang Jenderal Napoleon"></textarea>
                                @error('FilmSynopsis')
                                    <div class="errorMessage">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input">
                                <div class="inputText">Genre <a href="{{ route('showGenreView') }}">See Details</a></div>
                                <div class="inputBox">
                                    <select class="inputSelect" name="Genre">
                                        <option selected>Select One</option>
                                        @foreach ($genre as $genres)
                                            <option value="{{ $genres->id }}">{{ $genres->GenreName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('Genre')
                                    <div class="errorMessage">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input">
                                <div class="inputText">Duration</div>
                                <div class="inputBox">
                                    <input type="number" placeholder="180" id="filmDurationInput" name="FilmDuration">
                                    minutes
                                </div>
                                @error('FilmDuration')
                                    <div class="errorMessage">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input">
                                <div class="inputText">Release Date</div>
                                <div class="inputDate">
                                    <input type="date" id="filmReleaseDate" name="FilmReleaseDate">
                                </div>
                                @error('FilmReleaseDate')
                                    <div class="errorMessage">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input">
                                <div class="inputText">Age Restriction</div>
                                <div class="inputBox">
                                    <input type="text" placeholder="R 17+" id="filmRatingInput" name="FilmAgeRestriction">
                                </div>
                                @error('FilmAgeRestriction')
                                    <div class="errorMessage">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input">
                                <div class="inputText">Director Name</div>
                                <div class="inputBox">
                                    <input type="text" placeholder="Ridley Scott" id="filmDirectorInput" name="FilmDirector">
                                </div>
                                @error('FilmDirector')
                                    <div class="errorMessage">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input">
                                <div class="inputText">Film Rating</div>
                                <div class="inputBox">
                                    <input type="number" placeholder="9.8" step="0.01" name="FilmRating">
                                </div>
                                @error('FilmDuration')
                                    <div class="errorMessage">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="middleRight">
                        <div class="input">
                            <div class="inputText">Film Language</div>
                            <div class="inputBox">
                                <input type="text" placeholder="English" name="FilmLanguage">
                            </div>
                            @error('FilmLanguage')
                                <div class="errorMessage">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <div class="inputText">Film Subtitle</div>
                            <div class="inputBox">
                                <input type="text" placeholder="Indonesia" name="FilmSubtitle">
                            </div>
                            @error('FilmSubtitle')
                                <div class="errorMessage">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <div class="inputText">Film Poster</div>
                            <div class="inputBox">
                                <input type="file" id="uploadFile" name="FilmPoster">
                            </div>
                            @error('FilmPoster')
                                <div class="errorMessage">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <div class="inputText">Film Trailer</div>
                            <div class="inputBox">
                                <input type="file" id="uploadFile" name="FilmTrailer">
                            </div>
                            @error('FilmTrailer')
                                <div class="errorMessage">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <div class="inputText">Place Name</div>
                            <div class="inputBox">
                                <input type="text" name="PlaceName">
                            </div>
                            @error('PlaceName')
                                <div class="errorMessage">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <div class="inputText">Theater Number</div>
                            <div class="inputBox">
                                <input type="text" name="TheatreNumber">
                            </div>
                            @error('TheatreNumber')
                                <div class="errorMessage">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <div class="inputText">Date</div>
                            <div class="inputDate">
                                <input type="date" name="ShowDate">
                            </div>
                            @error('ShowDate')
                                <div class="errorMessage">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <div class="inputText">Time</div>
                            <div class="inputDate">
                                <input type="time" name="ShowTime">
                            </div>
                            @error('ShowTime')
                                <div class="errorMessage">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bottom">
                    <div class="haveAccountbutton">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
