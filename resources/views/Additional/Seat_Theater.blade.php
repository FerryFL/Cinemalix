<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Conatct Support</title>
    <link rel="stylesheet" href="{{ asset('Style/Navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('Style/Additional/Seat_Theater.css') }}">
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
            <h1>Pick Seat</h1>
            <hr>
            <div class="wrapper">
                <div class="description-header">
                    <div class="left-description-header">
                        <h4>Napoleon</h4>
                        <p>(2D)</p>
                    </div>
                    <div class="right-description-header">
                        <p>3 December</p>
                        <p>Central Park</p>
                        <p>Theatre 1</p>
                        <p>09:00</p>
                    </div>
                </div>
                <div class="screen">Screen</div>
                <div class="theater">
                    <div class="row">
                        @php
                            $char = ['A', 'B', 'C', 'D', 'E', 'F'];
                        @endphp
                        @for ($i = 0; $i < 7; $i++)
                            @for ($j = 0; $j < 23;   $j++)
                                @if ($j == 11 && $i != 6)
                                    <div class="seat" id="alphabet">{{ $char[$i] }}</div>
                                @elseif($i != 6)
                                    @if ($j < 11)
                                        <div data-seat="{{ $char[$i].$j+1 }}" class="seat">{{ $char[$i].$j+1 }}</div>
                                    @elseif($j > 11)
                                        <div data-seat="{{ $char[$i].$j }}" class="seat">{{ $char[$i].$j }}</div>
                                    @endif
                                @else
                                    @if ($j < 11)
                                        <div class="seat" id="number-rows">{{ $j + 1 }}</div>
                                    @elseif ($j == 11)
                                        <div></div>
                                    @else
                                    <div class="seat" id="number-rows">{{ $j }}</div>
                                    @endif
                                @endif
                            @endfor
                        @endfor

                    </div>
                </div>
                <div class="status">
                    <div class="round" id="unavailable"></div>
                    <span>Unavailable</span>
                    <div class="round" id="available"></div>
                    <span>Available</span>
                    <div class="round" id="selected"></div>
                    <span>Selected</span>
                </div>
                <div class="detail-seat">
                    <form class="enterTicket" action="">
                        <input id="inputSeats" value="" name="SeatPosition" hidden type="text">
                        <label id="labelSeats" for="SeatPosition">Seat no: </label>
                        <Button type="submit">Order Now</Button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('Script/pickSeat.js') }}"></script>
</body>
</html>
