<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar-1">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            TripGo<span>Travel Agency</span>
        </a>

        {{-- TOGGLER --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false">

            <span class="oi oi-menu"></span> Menu
        </button>


        {{-- COLLAPSE --}}
        <div class="collapse navbar-collapse" id="ftco-nav">

            <ul class="navbar-nav ml-auto align-items-center">

                <li class="nav-item">
                    <a href="{{ route('destinations.index') }}" class="nav-link">Daftar Trip</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gallery.index') }}" class="nav-link">Gallery</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('tentang_kami.index') }}" class="nav-link">Tentang Kami</a>
                </li>

                {{-- CART --}}
                <li class="nav-item">
                    <a href="{{ route('booking.my') }}" class="nav-link">
                        <i class="fa fa-shopping-cart"></i>
                        <span id="cart-badge" class="badge badge-primary">0</span>
                    </a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                                class="rounded-circle" width="30" height="30"
                                style="object-fit: cover; margin-right: 8px;">

                            {{ auth()->user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">

                            {{-- <a href="{{ route('my.booking') }}" class="dropdown-item">
                                My Booking
                            </a> --}}

                            <div class="dropdown-divider"></div>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    Logout
                                </button>
                            </form>

                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('google.login') }}" class="nav-link">
                            Login
                        </a>
                    </li>
                @endauth

            </ul>

        </div>

    </div>
</nav>
