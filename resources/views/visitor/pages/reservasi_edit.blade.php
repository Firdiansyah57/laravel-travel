@extends('visitor.layout.app')

@section('content')
    @include('visitor.components.navbar_custom')

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                {{-- KIRI: DETAIL TRIP (SHOW) --}}
                <div class="col-md-5">
                    <div class="card border-0 shadow-sm p-3" style="border-radius: 20px;">
                        <img src="{{ asset('images/destinations/' . ($trip->destination->image ?? 'default.jpg')) }}"
                            class="img-fluid mb-3" style="border-radius: 15px; height: 250px; object-fit: cover;">
                        <h3 class="font-weight-bold">{{ $trip->destination->title }}</h3>
                        <p class="text-muted"><i
                                class="fa fa-map-marker-alt mr-2 text-danger"></i>{{ $trip->destination->location ?? 'Indonesia' }}
                        </p>
                        <hr>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between mb-2">
                                <span>Tanggal Trip:</span>
                                <strong>{{ \Carbon\Carbon::parse($trip->trip_date)->format('d F Y') }}</strong>
                            </li>
                            <li class="d-flex justify-content-between mb-2">
                                <span>Harga Per Pax:</span>
                                <strong class="text-success">Rp
                                    {{ number_format($trip->destination->price, 0, ',', '.') }}</strong>
                            </li>
                            <li class="d-flex justify-content-between mb-2">
                                <span>Tipe Pembayaran:</span>
                                <span class="badge badge-primary">{{ strtoupper($booking->payment_type) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- KANAN: FORM EDIT & BAYAR --}}
                <div class="col-md-7">
                    <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
                        <h4 class="font-weight-bold mb-4">Edit & Konfirmasi Pembayaran</h4>

                        <form action="{{ route('reservasi.update', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{ $booking->name }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Nomor WhatsApp</label>
                                <input type="text" name="phone" class="form-control" value="{{ $booking->phone }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Jumlah Peserta</label>
                                <div class="input-group">
                                    <input type="number" name="qty" id="qtyInputUpdate" class="form-control"
                                        value="{{ $booking->qty }}" min="1" max="{{ $trip->destination->quota }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Orang</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-primary text-white p-3 rounded mb-4 shadow-sm">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Total Yang Harus Dibayar:</span>
                                    <h3 class="mb-0 font-weight-bold" id="totalDisplayUpdate">
                                        Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                                    </h3>
                                </div>
                                @if ($booking->payment_type == 'dp')
                                    <small>* Anda memilih DP 50%, sisa pembayaran dilakukan di lokasi.</small>
                                @endif
                            </div>

                            <div class="d-flex">
                                <button type="submit" class="btn btn-warning text-white flex-grow-1 mr-2 font-weight-bold">
                                    <i class="fa fa-save mr-2"></i>Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const pricePerPax = {{ $trip->destination->price }};
        const payType = "{{ $booking->payment_type }}";
        const qtyIn = document.getElementById('qtyInputUpdate');
        const display = document.getElementById('totalDisplayUpdate');

        qtyIn.addEventListener('input', function() {
            let currentQty = this.value;
            let subtotal = currentQty * pricePerPax;

            // LOGIKA JAVASCRIPT UNTUK DP
            let finalPrice = (payType === 'dp') ? (subtotal * 0.5) : subtotal;

            display.innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(finalPrice);
        });
    </script>
@endsection
