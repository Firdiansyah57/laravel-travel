<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light custom-navbar" id="ftco-navbar-2">
    <div class="container">
        <a class="navbar-brand brand-logo" href="{{ route('home') }}">TripGo<span>Travel Agency</span></a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">

            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="{{ route('destinations.index') }}" class="nav-link">Daftar Trip</a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('gallery.index') }}" class="nav-link">Gallery</a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('tentang_kami.index') }}" class="nav-link">Tentang Kami</a>
                </li>
                @php
                    $cartCount = \App\Models\Booking::where('user_id', auth()->id())
                        ->where('status', 'draft')
                        ->count();
                @endphp

                <li class="nav-item active">
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
                    <li class="nav-item active">
                        <a href="{{ route('google.login') }}" class="nav-link">
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


<script>
    function updateCartCount() {
        @auth
        fetch("{{ route('cart.count') }}")
            .then(response => response.json())
            .then(data => {
                // Update semua elemen dengan class 'cart-badge'
                document.querySelectorAll('.cart-badge').forEach(el => {
                    el.innerText = data.count;
                    // Beri efek animasi kecil jika angka berubah
                    el.style.transform = "scale(1.2)";
                    setTimeout(() => el.style.transform = "scale(1)", 200);
                });

                // Juga update ID spesifik jika ada
                const badgeId = document.getElementById('cart-badge');
                if (badgeId) badgeId.innerText = data.count;
            })
            .catch(error => console.error('Error fetching cart count:', error));
    @endauth
    }

    // Jalankan saat load dan setiap 10 detik
    document.addEventListener('DOMContentLoaded', updateCartCount);
    setInterval(updateCartCount, 10000);

    document.querySelector('.navbar-toggler').addEventListener('click', function () {
    this.classList.toggle('collapsed');
});
</script>
