<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Support</title>
    <link rel="stylesheet" href="{{ asset('Style/Navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('Style/Additional/Contact_Support.css') }}">
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
            <form action="">
                <h1>Contact Support</h1>
                <div class="form-wrapper">
                    <div class="left-side">
                        <div class="input-box">
                            <label for="">Email</label>
                            <input type="email" name="" id="" placeholder="bryan@gmail.com">
                        </div>
                        <div class="input-box">
                            <label for="">Topic (general, bug, others)</label>
                            <input type="text" name="" id="" placeholder="General">
                        </div>
                    </div>

                    <div class="right-side">
                        <div class="input-box">
                            <label for="">Description</label>
                            <textarea name="" id="" cols="40" rows="10" placeholder="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus, iure?"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </main>
</body>
</html>
