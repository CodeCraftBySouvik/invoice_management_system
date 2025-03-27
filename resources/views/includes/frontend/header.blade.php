
<!-- Start header -->
<header class="header">
    <nav class="navbar navbar-expand-md navbar-dark bg-black" aria-label="Navbar">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between py-3 w-100">
                <a href="{{ route('home') }}" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                    <img class="logo" src="{{ env('COMMON_HOST') . 'assets/frontend/img/logo.svg' }}" alt="Logo" width="170" height="46" loading="lazy" />
                </a>

                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                    <img class="icon" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-menu.svg' }}" alt="Icon" width="30" height="30" loading="lazy" />
                </button>

                <div class="collapse navbar-collapse flex-grow-0" id="navbarMain">
                    <ul class="navbar-nav align-items-md-center">
                        <li class="nav-item me-md-4"><a href="{{ route('home') }}" class="nav-link @if( Route::is('home')) active @endif" aria-current="page">Home</a></li>
                        <li class="nav-item mx-md-4"><a href="{{ config('app.main_front_url') }}/demo" class="nav-link @if( Route::is('home2')) active @endif">Play App Video</a></li>
                        <li class="nav-item mx-md-4"><a href="{{ Auth::check() ? route('pricing') : route('register')}}" class="nav-link @if( Route::is('pricing')) active @endif">Pricing</a></li>
                        @if(!Auth::check())
                        <li class="nav-item mt-2 mt-md-0 ms-md-5 me-md-3"><a href="{{ route('login') }}" class="nav-link btn btn-primary-app dark">Upgrade Now</a></li>
                        @endif
                        @if(!Auth::check())
                        <li class="nav-item mt-2 mt-md-0 "><a href="{{route('register')}}" class="nav-link btn btn-outline btn-primary-app dark">Free Trial</a></li>
                        @else
                        <li class="nav-item mt-2 mt-md-0 ms-md-5 me-md-3"><a href="{{ route('free-trial-dashboard') }}" class="nav-link btn btn-primary-app dark">Free Trial</a></li>
                        @endif
                        @if(Auth::check() && Auth::user()->id == 1)
                        <li class="nav-item mt-2 mt-md-0 "><a href="{{route('package-customize')}}" class="nav-link btn btn-outline btn-primary-app dark ms-3">Customize Package</a></li>
                        @endif
                        @if(Auth::check())
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()" class="nav-link btn btn-outline btn-primary-app dark ms-3" data-bs-toggle="" href="#" data-bs-target="">
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->