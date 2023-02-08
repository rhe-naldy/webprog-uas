<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-success p-3 mb-5">
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
                <button class="btn btn-danger" type="button" onclick="window.location='/{locale}/register'" style="margin-right: 1rem">{{__('account.register')}}</button>
                <button class="btn btn-primary" type="button" onclick="window.location='/{locale}/login'" style="margin-right: 1rem">{{__('account.login')}}</button>
            @elseif(Auth::check())
                <form action="/logout" method="POST" style="margin-right: 1rem">
                    @csrf
                    <button class="btn btn-danger " type="submit">{{__('account.logout')}}</button>
                </form>
            @endif
            <div class="dropdown" style="margin-right: 5rem">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(App::getLocale() == "en")
                        English
                    @elseif(App::getLocale() == "id")
                        Indonesian
                    @endif
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/lang/en">English</a></li>
                    <li><a class="dropdown-item" href="/lang/id">Indonesian</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
