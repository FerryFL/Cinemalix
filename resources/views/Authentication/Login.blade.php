<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinemalix Login</title>
    <link rel="stylesheet" href="{{ asset('Style/Navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('Style/Authentication/Login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="{{ asset('script.js') }}"></script>
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
                </div>
            </ul>
            <ul>
                <div class="rightRight">
                    <li>
                        <a href="{{ route('loginView') }}">Login</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="top">
                Login
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="middle">
                    <div class="input">
                        <div class="inputText">Email</div>
                        <div class="inputBox">
                            <input type="text" name="email" placeholder="Email" id="emailInput">
                        </div>
                        @error('email')
                            <div class="errorMessage">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input">
                        <div class="inputText">Password</div>
                        <div class="inputBox">
                            <input type="password" name="password" placeholder="Password" id="passwordInput">
                            <img onclick="showPassword()" src="{{ asset('Asset/Show.png') }}" alt="Show">
                        </div>
                        @error('password')
                            <div class="errorMessage">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="forgot">
                        <a href="">Forgot Password</a>
                    </div>
                </div>
                <div class="bottom">
                    <div class="haveAccountText">
                            Don't Have an Account? <a href="{{ route('registerView') }}">Click Here</a>
                    </div>
                    <div class="haveAccountbutton">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>

    </main>
</body>
</html>
