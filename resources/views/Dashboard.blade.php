<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Style/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('Style/Navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('Style/Footer.css') }}">
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
        <div class="carousel-box">
            <div class="carousel-left"></div>
            <div class="carousel-mid">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="{{ asset('./storage/ImageSlider/Digimon Adventure 02.png') }}" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <img src="{{ asset('./storage/ImageSlider/Jatuh Cinta Seperti Di Film-Film.png') }}"
                            style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <img src="{{ asset('./storage/ImageSlider/Napoleon.png') }}" style="width:100%">
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
            <div class="carousel-right"></div>
        </div>
        <script defer src="{{ asset('Script/dashboard.js') }}"></script>
        <br>

        <div class="container">
            <div class="barrier">
                <hr />
                <div class="barrier-box">
                    <h1>Now Playing</h1>
                </div>
                <hr />
            </div>

            <div class="card-container">
                @php
                    $iter = 0;
                @endphp
                @foreach ($film as $i)
                    @if ($iter <= 3)
                        <a href="{{ route('detailFilmView', ['id' => $i->id]) }}" class="cards">
                            <div class="movie-card view-film">
                                <div class="movie-header">
                                    <img src="{{ asset('./storage/Poster/' . $i->FilmPoster) }}" />
                                </div>
                                <div class="movie-content">
                                    <h3>{{ $i->FilmAgeRestriction }}</h3>
                                    <h3><i class="bi bi-star-fill"></i>{{ $i->FilmRating }}</h3>
                                </div>
                            </div>
                        </a>
                    @endif
                    @php
                        $iter++;
                    @endphp
                @endforeach
            </div>

            <div class="barrier">
                <hr />
                <div class="barrier-box">
                    <h1>Trending Film</h1>
                </div>
                <hr />
            </div>

            <div class="card-container">
                @php
                    $iter = 0;
                @endphp
                @foreach ($film as $i)
                    @if ($iter <= 3)
                        <a href="{{ route('detailFilmView', ['id' => $i->id]) }}" class="cards">
                            <div class="movie-card view-film">
                                <div class="movie-header">
                                    <img src="{{ asset('./storage/Poster/' . $i->FilmPoster) }}" />
                                </div>
                                <div class="movie-content">
                                    <h3>{{ $i->FilmAgeRestriction }}</h3>
                                    <h3><i class="bi bi-star-fill"></i>{{ $i->FilmRating }}</h3>
                                </div>
                            </div>
                        </a>
                    @endif
                    @php
                        $iter++;
                    @endphp
                @endforeach
            </div>


            <div class="barrier">
                <hr />
                <div class="barrier-box">
                    <h1>Upcoming Film</h1>
                </div>
                <hr />
            </div>

            <div class="card-container">
                @php
                    $iter = 0;
                @endphp
                @foreach ($film as $i)
                    @if ($iter <= 3)
                        <a href="{{ route('detailFilmView', ['id' => $i->id]) }}" class="cards">
                            <div class="movie-card view-film">
                                <div class="movie-header">
                                    <img src="{{ asset('./storage/Poster/' . $i->FilmPoster) }}" />
                                </div>
                                <div class="movie-content">
                                    <h3>{{ $i->FilmAgeRestriction }}</h3>
                                    <h3><i class="bi bi-star-fill"></i>{{ $i->FilmRating }}</h3>
                                </div>
                            </div>
                        </a>
                    @endif
                    @php
                        $iter++;
                    @endphp
                @endforeach
            </div>

            <div class="barrier">
                <hr />
                <div class="barrier-box">
                    <a href="{{ route('showFilmView') }}">See More!</a>
                </div>
                <hr />
            </div>
        </div>
    </main>

</body>

</html>
