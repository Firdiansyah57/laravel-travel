@extends('visitor.layout.app')

@section('content')
    @include('visitor.components.navbar_custom')

    <section class="ftco-section bg-light">
        <div class="container">
            {{-- Header Section --}}
            <div class="row justify-content-center mb-4">
                <div class="col-md-10">
                    <div class="d-flex justify-content-between align-items-end border-bottom pb-3">
                        <div>
                            <h2 class="mb-0 font-weight-bold">Riwayat Reservasi</h2>
                            <p class="text-muted mb-0">Kelola perjalanan dan pembayaran Anda di sini.</p>
                        </div>
                        <span class="badge badge-pill badge-primary px-3 py-2">
                            <i class="fa fa-shopping-cart mr-1"></i>
                            <span class="cart-badge">0</span> Item Keranjang
                        </span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    @if ($bookings->count() > 0)
                        @foreach ($bookings as $b)
                            <div class="card border-0 shadow-sm mb-4 overflow-hidden" style="border-radius: 15px;">
                                <div class="row no-gutters">
                                    {{-- Image Section --}}
                                    <div class="col-md-3">
                                        @if ($b->tripSchedule && $b->tripSchedule->destination)
                                            <div
                                                style="background-image: url('{{ asset('images/destinations/' . ($b->tripSchedule->destination->image ?? 'default.jpg')) }}');
                                                        background-size: cover; background-position: center; height: 100%; min-height: 150px;">
                                            </div>
                                        @else
                                            <div
                                                class="bg-secondary d-flex align-items-center justify-content-center text-white h-100">
                                                <i class="fa fa-image fa-2x"></i>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Content Section --}}
                                    <div class="col-md-6 p-4">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <small class="text-primary font-weight-bold">#{{ $b->id }}</small>
                                                <h4 class="mt-1 mb-1 font-weight-bold">
                                                    {{ $b->tripSchedule->destination->title ?? 'Destinasi Tidak Ditemukan' }}
                                                </h4>
                                            </div>

                                            {{-- 🔥 LOGIKA TIMER (Testing 1 Menit) --}}
                                            @if ($b->status == 'draft')
                                                <div class="text-right">
                                                    <span class="badge badge-danger p-2 shadow-sm" style="font-size: 11px;">
                                                        <i class="fa fa-clock mr-1"></i> SISA WAKTU:
                                                        <span class="countdown"
                                                            data-id="{{ $b->id }}"
                                                            data-time="{{ $b->created_at->addMinutes(1)->setTimezone('Asia/Jakarta')->toIso8601String() }}">
                                                        </span>
                                                    </span>
                                                    <br><small class="text-muted" style="font-size: 10px;">Segera bayar
                                                        sebelum kuota lepas</small>
                                                </div>
                                            @endif
                                        </div>

                                        <p class="mb-1">
                                            📅 {{ \Carbon\Carbon::parse($b->trip_date)->format('d F Y') }}
                                        </p>

                                        <p class="text-muted mb-2"><i class="fa fa-user mr-2"></i>{{ $b->name }}
                                            ({{ $b->qty }} Pax)
                                        </p>
                                        <div class="h5 mb-0 font-weight-bold text-success">
                                            Rp {{ number_format($b->total_price, 0, ',', '.') }}
                                            @if ($b->payment_type == 'dp')
                                                <small class="badge badge-light text-danger border ml-1">DP 50%</small>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Action Section --}}
                                    <div
                                        class="col-md-3 bg-light p-4 d-flex flex-column justify-content-center border-left">
                                        <div class="text-center mb-3">
                                            @if ($b->status == 'paid')
                                                <span class="badge badge-success px-4 py-2 w-100"
                                                    style="border-radius: 20px;">
                                                    <i class="fa fa-check-circle mr-1"></i> LUNAS
                                                </span>
                                            @elseif($b->status == 'dp50%')
                                                <span class="badge badge-info px-4 py-2 w-100" style="border-radius: 20px;">
                                                    <i class="fa fa-wallet mr-1"></i> DP TERBAYAR
                                                </span>
                                            @elseif($b->status == 'draft')
                                                <span class="badge badge-secondary px-4 py-2 w-100 mb-2"
                                                    style="border-radius: 20px;">
                                                    <i class="fa fa-shopping-basket mr-1"></i> DI KERANJANG
                                                </span>
                                            @elseif($b->status == 'cancelled')
                                                <span class="badge badge-danger px-4 py-2 w-100"
                                                    style="border-radius: 20px;">
                                                    <i class="fa fa-times-circle mr-1"></i> BATAL/EXPIRED
                                                </span>
                                            @endif
                                        </div>

                                        @if ($b->status == 'draft')
                                            <a href="{{ route('payment.show', $b->id) }}"
                                                class="btn btn-primary btn-sm mb-2 shadow-sm">
                                                <i class="fa fa-credit-card mr-1"></i> Bayar Sekarang
                                            </a>
                                            <div class="d-flex">
                                                <a href="{{ route('reservasi.edit', $b->id) }}"
                                                    class="btn btn-outline-warning btn-sm flex-grow-1 mr-1">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('booking.destroy', $b->id) }}" method="POST"
                                                    class="flex-grow-1 ml-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100"
                                                        onclick="return confirm('Hapus reservasi?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{-- Empty State --}}
                        <div class="card border-0 shadow-sm p-5 text-center" style="border-radius: 15px;">
                            <div class="py-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" width="120"
                                    class="mb-4 opacity-50">
                                <h4 class="font-weight-bold">Keranjang Anda Kosong</h4>
                                <p class="text-muted">Belum ada petualangan yang Anda rencanakan.</p>
                                <a href="{{ route('destinations.index') }}"
                                    class="btn btn-primary px-4 py-2 mt-2 shadow">Jelajahi Destinasi</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- 🔥 SCRIPT COUNTDOWN --}}
  <script>
function startCountdowns() {
    const timers = document.querySelectorAll('.countdown');

    timers.forEach(timer => {
        const targetDate = new Date(timer.dataset.time).getTime();
        const bookingId = timer.dataset.id;

        const interval = setInterval(() => {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance <= 0) {
                clearInterval(interval);
                timer.innerHTML = "WAKTU HABIS";

                // 🔥 AUTO DELETE BOOKING
                fetch("{{ url('/booking/delete') }}/" + bookingId, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    }
                })
                .then(() => {
                    location.reload();
                });

                return;
            }

            const minutes = Math.floor(distance / 60000);
            const seconds = Math.floor((distance % 60000) / 1000);

            timer.innerHTML =
                String(minutes).padStart(2, '0') + ":" +
                String(seconds).padStart(2, '0');

        }, 1000);
    });
}

document.addEventListener('DOMContentLoaded', startCountdowns);
</script>
@endsection
