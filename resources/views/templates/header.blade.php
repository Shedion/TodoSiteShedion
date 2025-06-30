<link rel="stylesheet" href="{{ asset('css/styletemp.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=keyboard_arrow_down" />



<div id="titlebar">
    <div id="logo">
        <a href="{{ route('home') }}">
            <img src="../img/logo.png" alt="logo" width="120" height="120">
        </a>
    </div>
    <div id="title">
        <h1>Just Do It</h1>
    </div>
    <div id="user">
        @if(session('username'))
            <span id="account-bts">Logged in as {{ session('username') }}</span>
            <div class="dropdown-content">
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        @else
            <a href="#" id="account-bts">Account</a>
            <div class="dropdown-content">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
        @endif
    </div>
</div>
<div id="nav-bar">
    <a class="nav-bts" href="{{ route('home') }}">Home</a>
    <a class="nav-bts" href="{{ route('about') }}">About</a>
    <a class="nav-bts" href="{{ route('contact') }}">Contact</a>


</div>