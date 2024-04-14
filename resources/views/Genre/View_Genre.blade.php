<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Genre</title>
    <link rel="stylesheet" href="{{ asset('Style/Navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('Style/View_Genre.css') }}">
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
    <main class="container">
        <div class="content">
            <h1>List Genres</h1>
            <ul>
                @foreach ($genre as $i)
                    @csrf
                    @method('delete')
                    <button data-genre-id="{{ $i->id }}" id="Genre" class="Genre">{{$i->GenreName}}</button>
                @endforeach

            </ul>
            <p>Click Genre to Edit/Delete</p>
            <div class="formCreate">
                <form class="FormCreateGenre" method="POST" action="{{ route('createGenre') }}">
                    @csrf
                    <div class="input-box">
                        <label for="">Create Genre:</label>
                        <input placeholder="Genre" name="GenreName" type="text">
                        @error('GenreName')<div class="error">{{$message}}</div>@enderror
                    </div>

                    <div class="button-list">
                        <button type="submit">Submit</button>
                        <a href="{{ route('createFilmView') }}">Back</a>
                    </div>

                </form>
            </div>

            <div class="formEdit">
                <div class="formList">
                    <form class="FormCreateGenre" id="formEditGenre" method="POST" action="">
                        @csrf
                        @method('patch')
                        <div class="input-box">
                            <label for="">Edit Genre:</label>
                            <input id="editInputGenre" value="" placeholder="Genre" name="GenreName" type="text">
                            @error('GenreName')<div class="error">{{$message}}</div>@enderror
                        </div>

                        <div class="button-list">
                            <button type="submit">Submit</button>
                            <a href="{{ route('createFilmView') }}">Back</a>
                        </div>
                    </form>
                    <form class="FormCreateGenre" id="formDeleteGenre" method="POST" action="">
                        @csrf
                        @method('delete')
                        <button>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('Script/createGenre.js') }}"></script>
</body>
</html>
