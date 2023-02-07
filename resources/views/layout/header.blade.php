<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary p-3 mb-5">
    <a class="navbar-brand mb-1 mx-2 h1" href="/">Amazing E-Grocery</a>
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
