@extends('visitor.layout.app')

@section('content')
    @include('visitor.components.navbar_custom')

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="reservation-header mb-4">
                <h1 class="reservation-title">Detail Reservasi</h1>
            </div>

            <form action="{{ route('reservasi.store') }}" method="POST">
                @csrf
                <input type="hidden" name="schedule_id" value="{{ $trip->id }}">

                <div class="row">
                    {{-- LEFT SIDE --}}
                    <div class="col-md-8">
                        <div class="card card-body border-0 shadow-sm mb-4">
                            <h4 class="trip-title text-primary">Informasi Paket Trip</h4>
                            <p class="mb-1"><b>Judul :</b> {{ $trip->destination->title }}</p>
                            <p><b>Tanggal :</b> {{ \Carbon\Carbon::parse($trip->trip_date)->format('d F Y') }}</p>
                        </div>

                        <div class="card card-body border-0 shadow-sm">
                            <h4 class="section-title mb-3">Informasi Pemesan <span class="text-danger">*</span></h4>

                            <div class="form-group mb-3">
                                <label>Nama Pemesan</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label>E-Mail</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}"
                                    class="form-control bg-light" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label>Nomor WhatsApp</label>
                                <input type="tel" name="phone" class="form-control" placeholder="0812XXXXXXX"
                                    required>
                                <small class="text-muted">Pastikan nomor WhatsApp aktif.</small>
                            </div>

                            <div class="form-group mb-0">
                                <label>Jumlah Peserta</label>
                                <input type="number" name="qty" id="qtyInput" class="form-control" value="1"
                                    min="1" max="{{ $trip->destination->quota }}" required>
                                <small class="text-info font-weight-bold">Maksimal {{ $trip->destination->quota }}
                                    orang</small>
                            </div>
                        </div>
                    </div>

                    {{-- RIGHT SIDE --}}
                    <div class="col-md-4">
                        <div class="card card-body border-0 shadow-sm sticky-top" style="top: 100px;">
                            <h4 class="payment-title">Detail Biaya</h4>
                            <hr>

                            <div class="d-flex justify-content-between mb-2">
                                <span id="paxText">1 Pax</span>
                                <strong>Rp <span
                                        id="totalPrice">{{ number_format($trip->destination->price, 0, ',', '.') }}</span></strong>
                            </div>

                            <div class="price-summary bg-light p-3 rounded">
                                <div class="d-flex justify-content-between font-weight-bold h5 mb-0">
                                    <span>Total</span>
                                    <span class="text-primary">Rp <span
                                            id="summaryTotal">{{ number_format($trip->destination->price, 0, ',', '.') }}</span></span>
                                </div>
                                <div id="dpRow" class="mt-2 text-danger" style="display:none;">
                                    <small>Bayar Sekarang (DP 50%): <br>
                                        <strong class="h6">Rp <span id="dpPrice">0</span></strong></small>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h6 class="font-weight-bold">Tipe Pembayaran</h6>
                                <div class="custom-control custom-radio mt-2">
                                    <input type="radio" id="full" name="payment_type" value="full"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label font-weight-normal" for="full">Bayar
                                        Lunas</label>
                                </div>
                                <div class="custom-control custom-radio mt-2">
                                    <input type="radio" id="dp" name="payment_type" value="dp"
                                        class="custom-control-input">
                                    <label class="custom-control-label font-weight-normal" for="dp">DP 50% (Pelunasan
                                        di lokasi)</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-block btn-lg mt-4 shadow-sm">
                                Konfirmasi & Bayar
                            </button>
                            <small class="d-block text-center mt-3 text-muted">Aman & Terenkripsi oleh Midtrans</small>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script>
        const unitPrice = {{ $trip->destination->price }};
        const qtyInput = document.getElementById('qtyInput');
        const summaryTotal = document.getElementById('summaryTotal');
        const totalPrice = document.getElementById('totalPrice');
        const paxText = document.getElementById('paxText');
        const dpRow = document.getElementById('dpRow');
        const dpPrice = document.getElementById('dpPrice');

        function calculate() {
            let qty = qtyInput.value;
            let total = qty * unitPrice;
            let dp = total / 2;

            paxText.innerText = qty + " Pax";
            summaryTotal.innerText = new Intl.NumberFormat('id-ID').format(total);
            totalPrice.innerText = new Intl.NumberFormat('id-ID').format(total);
            dpPrice.innerText = new Intl.NumberFormat('id-ID').format(dp);

            dpRow.style.display = document.getElementById('dp').checked ? 'flex' : 'none';
        }

        qtyInput.addEventListener('input', calculate);
        document.getElementsByName('payment_type').forEach(radio => {
            radio.addEventListener('change', calculate);
        });
    </script>
@endsection
