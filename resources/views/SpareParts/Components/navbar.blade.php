<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}"> <!-- Add your custom CSS -->
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="{{ route('home') }}">
                {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo"> --}}
                <span>BAJAJ Spare Parts</span>
            </a>
        </div>
        <ul class="navbar-menu">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('shop') }}">Shop</a></li>
            <li><a href="{{ route('cart') }}">Cart</a></li>
            <li><a href="{{ route('orders') }}">Orders</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Categories</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('category', ['category' => 'engine']) }}">Engine Parts</a></li>
                    <li><a href="{{ route('category', ['category' => 'brakes']) }}">Brakes</a></li>
                    <li><a href="{{ route('category', ['category' => 'tires']) }}">Tires</a></li>
                    <li><a href="{{ route('category', ['category' => 'suspension']) }}">Suspension</a></li>
                </ul>
            </li>
        </ul>
        <div class="navbar-login">
            @guest
                <a href="{{ route('login') }}" class="btn">Login</a>
                <a href="{{ route('register') }}" class="btn">Register</a>
            @else
                <a href="{{ route('logout') }}" class="btn"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </nav>
</body>
</html>
