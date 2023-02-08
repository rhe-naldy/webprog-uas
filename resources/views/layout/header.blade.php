<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary p-3 mb-5">
    <a class="navbar-brand mb-1 mx-2 h1" href="/">Amazing E-Grocery</a>
    <div class="collapse navbar-collapse justify-content-between">
        <ul class="navbar-nav mr-auto">
            @if (!Auth::check())
                {{-- Empty on purpose. Do not display the navbar --}}
            @elseif (Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="/{locale}/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/{locale}/cart">Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/{locale}/profile">Profile</a>
            </li>
            @if (Auth::user()->role->role_name == "admin")
            <li class="nav-item">
                <a class="nav-link" href="/{locale}/maintenance">Account Maintenance</a>
            </li>
            @endif
            @endif
        </ul>
        <div class="d-flex flex-row">
            @if (!Auth::check())
                <button class="btn btn-danger" type="button" onclick="window.location='/{locale}/register'">{{__('account.register')}}</button>
                <button class="btn btn-primary" type="button" onclick="window.location='/{locale}/login'">{{__('account.login')}}</button>
            @elseif(Auth::check())
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">{{__('account.logout')}}</button>
                </form>
            @endif
            <div class="dropdown">
                <a class="navbar-brand text-black dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(App::getLocale() == "en")
                        English
                    @elseif(App::getLocale() == "id")
                        Indonesian
                    @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/en">English</a>
                    <a class="dropdown-item" href="/id">Indonesian</a>
                </div>
            </div>
        </div>
    </div>
</nav>
