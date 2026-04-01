@extends('visitor.layout.app')

@section('content')
    @include('visitor.components.navbar_custom')

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4 shadow-sm">
                        <h2 class="mb-4 text-center">Pembayaran Booking</h2>
                        <hr>
                        <div class="booking-details mb-4">
                            <p><strong>Nama Pemesan:</strong> {{ $booking->name }}</p>
                            <p><strong>Email:</strong> {{ $booking->email }}</p>
                            <p><strong>Total Pembayaran:</strong> <span class="text-success h4">Rp
                                    {{ number_format($booking->total_price, 0, ',', '.') }}</span></p>
                        </div>

                        <button id="pay-button" class="btn btn-primary btn-block btn-lg">Bayar Sekarang</button>

                        <div class="mt-3 text-center">
                            <small class="text-muted text-uppercase">Secure Payment by Midtrans</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Script Midtrans --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <script>
        document.getElementById('pay-button').onclick = function() {
            let snapToken = "{{ $snapToken }}";

            if (!snapToken) {
                alert("Snap token tidak ditemukan, silakan refresh halaman.");
                return;
            }

            snap.pay(snapToken, {
                onSuccess: function(result) {
                    window.location.href = "{{ route('booking.my') }}";
                },
                onPending: function(result) {
                    window.location.href = "{{ route('booking.my') }}";
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                    console.log(result);
                }
            });
        };
    </script>
@endsection
