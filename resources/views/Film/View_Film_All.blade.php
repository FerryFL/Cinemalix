<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Film All</title>
    <link rel="stylesheet" href="{{ asset('Style/Navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('Style/Film/View_Film_All.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script defer src="{{ asset('View_Film_All.js') }}"></script>
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
            <div class="barrier">
                @can('isAdmin')
                <a href="{{ route('createFilmView') }}"><button>Create Film</button></a>
                @endcan
                <hr/>
            </div>

            <div class="card-container">
                @foreach ($film as $films)
                    <a href="{{ route('detailFilmView', ['id'=>$films->id]) }}" class="cards">
                        <div class="movie-card view-film">
                            <div class="movie-header">
                                <img src="{{ asset('./storage/Poster/'.$films->FilmPoster) }}" />
                            </div>
                            <div class="movie-content">
                                <h3>{{ $films->FilmAgeRestriction}}</h3>
                                <h3><i class="bi bi-star-fill"></i>{{ $films->FilmRating}}</h3>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>
