<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/">
            <img src="{{asset('images/white-logo.png')}}" alt="Swiffy" width="30" height="24">
             {{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!--to enable the links for the guest users-->
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('login') ? 'active' : '' }}"  href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('register') ? 'active' : '' }}" href="/register">Register</a>
                    </li>
                @endguest
                <!--to restrict the dashboard link for the guest users-->
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">{{Auth::user()->name}}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
