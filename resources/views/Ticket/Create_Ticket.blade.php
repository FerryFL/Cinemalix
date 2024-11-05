<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Ticket</title>
    <link rel="stylesheet" href="{{ asset('Style/Navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('Style/Ticket/Create_Ticket.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet"
    />
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
            <section class="left-side">
                <img src="{{ asset('./storage/Poster/'.$film->FilmPoster) }}" alt="">
            </section>

            <section class="right-side">
                <h1>{{ $film->FilmName }}</h1>
                <hr>
                <div class="wrapper-description">
                    <div class="left-description">
                        <div class="title-description">
                            Genre :
                            <p class="detail-description">{{ $film->genres->GenreName }}</p>
                        </div>
                        <div class="title-description">
                            Duration :
                            <p class="detail-description">{{ $film->FilmDuration }}</p>
                        </div>
                        <div class="title-description">
                            Language :
                            <p class="detail-description">{{ $film->FilmLanguage }}</p>
                        </div>
                        <div class="title-description">
                            Subtitle :
                            <p class="detail-description">{{ $film->FilmSubtitle }}</p>
                        </div>
                    </div>
                    <div class="right-description">
                        <div class="rating">{{ $film->FilmAgeRestriction }}</div>
                        <div class="rating">
                            <img src="{{ asset('Asset/Star.png') }}" alt="" id="star-img">
                            <h4>{{ $film->FilmRating }}</h4>
                        </div>
                    </div>
                </div>
                <form action="{{route('viewSeat')}}">
                    <h1>3 December 2023</h1>
                    <hr id="line">
                    <div class="">
                        <h2>Central Park</h2>
                        <div class="theatre">
                            <h3>Theatre 1</h3>
                            <div class="theatre-2D">
                                <h3>2D</h3>
                                <button class="time">
                                    09:00
                                </button>
                                <button class="time">
                                    09:00
                                </button>
                                <button class="time">
                                    09:00
                                </button>
                                <button class="pick-seat">Pick Seat</button>
                            </div>
                            <div class="theatre-3D">
                                <h3>3D</h3>
                                <button class="time">
                                    09:00
                                </button>
                                <button class="time">
                                    09:00
                                </button>
                            </div>

                            <h3>Theatre 2</h3>
                            <div class="theatre-2D">
                                <h3>2D</h3>
                                <button class="time">
                                    09:00
                                </button>
                                <button class="time">
                                    09:00
                                </button>
                                <button class="time">
                                    09:00
                                </button>
                                <button class="pick-seat">Pick Seat</button>
                            </div>
                            <div class="theatre-3D">
                                <h3>3D</h3>
                                <button class="time">
                                    09:00
                                </button>
                                <button class="time">
                                    09:00
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </section>
        </div>
    </main>
</body>
</html>
