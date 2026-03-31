@extends('visitor.layout.app')

@section('content')
    @include('visitor.components.navbar_custom')

    <div class="container mt-5">

        {{-- NOTIF --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <br>
        <br>
        <h2>Pembayaran</h2>

        <div class="card mt-4">
            <div class="card-body">

                <p><b>Nama:</b> {{ $booking->name }}</p>
                <p><b>Email:</b> {{ $booking->email }}</p>
                <p><b>Jumlah Orang:</b> {{ $booking->qty }}</p>

                <hr>

                <h4>Total Bayar:</h4>
                <h3 class="text-success">
                    Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                </h3>

                <hr>

                <h5>Instruksi Pembayaran (Manual)</h5>

                <p>Silakan transfer ke rekening berikut:</p>

                <ul>
                    <li>BCA: 1234567890 a.n TripGo</li>
                    <li>Mandiri: 9876543210 a.n TripGo</li>
                </ul>

                <p class="text-muted">
                    Setelah transfer, konfirmasi ke WhatsApp admin.
                </p>

                <form action="{{ route('booking.confirm', $booking->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-success mt-3">
                        Saya Sudah Bayar
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection

<script>
    setTimeout(() => {
        $('.alert').fadeOut();
    }, 3000);
</script>
