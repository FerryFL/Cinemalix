<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $film->FilmName }}</title>
    <link rel="stylesheet" href="{{ asset('Style/Film/View_Detail_Film.css') }}">
    <link rel="stylesheet" href="{{ asset('Style/Navbar.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
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

            <div class="video-box">
                <div class="space"></div>
                <video controls>
                    <source src="{{ asset('./storage/Trailer/'.$film->FilmTrailer) }}" type="video/mp4" audio>
                </video>
                <div class="space"></div>
            </div>

            <div class="detail">
                <div class="detail-left">
                    <img src="{{ asset('./storage/Poster/'.$film->FilmPoster) }}" />
                </div>

                <div class="detail-right">
                    <h1>{{ $film->FilmName }}</h1>
                    <hr />
                    <div class="subdetail">
                        <div class="subdetail-left">
                            <p><b>Directed by : </b>{{ $film->FilmDirector }}</p>
                            <p><b>Release Date : </b>{{ $film->FilmReleaseDate }}</p>

                            <p><b>Staring : </b><br>
                                Joaquin Phoenix<br>
                                Vanessa Kirby<br>
                                Ludivine Sagnier</p>
                            <p><b>Genre : </b>{{ $genre->GenreName}}</p>
                            <p><b>Duration : </b>{{ $film->FilmDuration }} Minutes</p>
                            <p><b>Language : </b>{{ $film->FilmLanguage }}</p>
                            <p><b>Subtitle : </b>{{ $film->FilmSubtitle}}</p>
                            <div class="rating-box">
                                <div class="rating">
                                    <p>{{ $film->FilmAgeRestriction }}</p>
                                </div>
                                <div class="rating">
                                    <p>{{ $film->FilmRating }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="subdetail-right">
                            <h3>Synopsis</h3>
                            <p>{{ $film->FilmSynopsis }}</p>

                            <a href="{{ route('showTicket', ['filmID' => $film->id]) }}" class="order">
                                <p>Order Now</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
