<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="nav-item nav-link">Home</a>
                    <a class="nav-item nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a class="nav-item nav-link" href="#">RSS</a>

                @else
                    <a href="{{ route('login') }}" class="nav-item nav-link">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                    @endif
                @endauth
            @endif
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>
