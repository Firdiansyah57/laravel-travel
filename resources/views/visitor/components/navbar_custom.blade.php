<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light custom-navbar" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand brand-logo" href="{{ route('home') }}">TripGo<span>Travel Agency</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav">
            <span style="color:black; font-size:22px;"></span> MENU
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li> --}}
                <li class="nav-item {{ request()->routeIs('destinations.*') ? 'active' : '' }}">
                    <a href="{{ route('destinations.index') }}" class="nav-link">Destinasi</a>
                </li>

                <li class="nav-item {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
                    <a href="{{ route('gallery.index') }}" class="nav-link">Gallery</a>
                </li>

                <li class="nav-item {{ request()->routeIs('tentang_kami.*') ? 'active' : '' }}">
                    <a href="{{ route('tentang_kami.index') }}" class="nav-link">Tentang Kami</a>
                </li>
                {{-- <li class="nav-item active"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item active"><a href="contact.html" class="nav-link">Tentang Kami</a></li> --}}
            </ul>
        </div>
    </div>
</nav>
