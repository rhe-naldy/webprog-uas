<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary p-3 mb-5">
    <a class="navbar-brand mb-1 mx-2 h1" href="#">Amazing E-Grocery</a>
    <div class="collapse navbar-collapse justify-content-between">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cart">Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/profile">Profile</a>
            </li>
        </ul>
        <div>
            @if (!Auth::check())
                <button class="btn btn-danger" type="button" onclick="window.location='/register'">Register</button>
                <button class="btn btn-primary" type="button" onclick="window.location='/login'">Login</button>
            @elseif(Auth::check())
                <button class="btn btn-danger" type="button" onclick="window.location='/logout'">Logout</button>
            @endif
        </div>
    </div>
</nav>
</html>
