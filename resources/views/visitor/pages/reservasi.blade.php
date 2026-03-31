@extends('visitor.layout.app')

@section('content')
    @include('visitor.components.navbar_custom')

    <section class="ftco-section">

        <div class="container">

            <div class="reservation-header">
                <h1 class="reservation-title">
                    Detail Reservasi
                </h1>
            </div>

            <form action="{{ route('reservasi.store') }}" method="POST">

                @csrf
                <input type="hidden" name="schedule_id" value="{{ $trip->id }}">

                <div class="row">

                    {{-- ================= LEFT SIDE ================= --}}
                    <div class="col-md-8">

                        <div class="trip-info">

                            <h4 class="trip-title">
                                Informasi Paket Trip
                            </h4>

                            <p class="trip-detail">
                                <b>Judul Trip :</b>
                                {{ $trip->destination->title }}
                            </p>

                            <p class="trip-detail">
                                <b>Tanggal Trip :</b>
                                {{ \Carbon\Carbon::parse($trip->trip_date)->format('d F Y') }}
                            </p>

                        </div>


                        <div class="booking-section">

                            <h4 class="section-title">
                                Informasi Pemesan <span class="required">*</span>
                            </h4>

                            <p class="section-subtitle">
                                Mohon konfirmasi kembali detail kontak anda di bawah
                            </p>


                            <div class="form-group mb-3">

                                <label class="form-label">
                                    Nama Pemesan <span class="required">*</span>
                                </label>

                                <input type="text" name="name" class="form-control booking-input"
                                    placeholder="Nama lengkap" required>

                            </div>


                            <div class="form-group mb-3">

                                <label class="form-label">
                                    E-Mail <span class="required">*</span>
                                </label>

                                <input type="email" name="email" class="form-control booking-input"
                                    placeholder="email@gmail.com" required>

                                <small class="form-text text-muted">
                                    Diperoleh pada saat anda melakukan login
                                </small>

                            </div>


                            <div class="form-group mb-3">

                                <label class="form-label">
                                    Nomor WhatsApp <span class="required">*</span>
                                </label>

                                <input type="tel" name="phone" class="form-control booking-input"
                                    placeholder="0812XXXXXXX" required>

                                <small class="form-text text-muted">
                                    Mohon mencantumkan nomor dengan Whatsapp aktif
                                </small>

                            </div>


                            <div class="form-group mb-4">

                                <label class="form-label">
                                    Nomor WhatsApp 2
                                </label>

                                <input type="tel" name="phone_alt" class="form-control booking-input"
                                    placeholder="0812XXXXXXX">

                                <small class="form-text text-muted">
                                    Nomor alternatif jika nomor utama tidak dapat dihubungi
                                </small>

                            </div>

                            <div class="form-group mb-4">

                                <label class="form-label">
                                    Jumlah Peserta <span class="required">*</span>
                                </label>

                                <input type="number" name="qty" id="qtyInput" class="form-control booking-input"
                                    value="1" min="1" max="{{ $trip->quota }}" required>

                                <small class="text-muted">
                                    Maksimal {{ $trip->quota }} orang
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- ================= RIGHT SIDE ================= --}}
                    <div class="col-md-4">

                        <div class="payment-box">

                            <h4 class="payment-title">Detail Biaya</h4>

                            <hr>

                            <div class="price-item">

                                <div>
                                    <span id="paxText">
                                        1 Pax
                                    </span>,
                                    Rp {{ number_format($trip->destination->price, 0, ',', '.') }}/pax
                                </div>

                                <div class="text-right">
                                    1 x Rp {{ number_format($trip->destination->price, 0, ',', '.') }}/pax
                                    <br>
                                    <b>Rp <span id="totalPrice">
                                            {{ number_format($trip->destination->price, 0, ',', '.') }}
                                        </span></b>
                                </div>

                            </div>


                            <div class="price-summary">

                                <div class="d-flex justify-content-between">
                                    <span>Total</span>
                                    <span>
                                        Rp <span id="summaryTotal">
                                            {{ number_format($trip->destination->price, 0, ',', '.') }}
                                        </span>
                                    </span>
                                </div>

                                <div id="dpRow" style="display:none;" class="justify-content-between">

                                    <span>Down Payment</span>

                                    <span>
                                        Rp <span id="dpPrice">
                                            {{ number_format($trip->destination->price / 2, 0, ',', '.') }}
                                        </span>
                                    </span>

                                </div>

                            </div>

                        </div>


                        <div class="payment-method mt-4">

                            <h4>Metode Pembayaran</h4>

                            <label class="form-label">
                                Pilih metode pembayaran <span class="required">*</span>
                            </label>

                            <select class="form-control payment-select" name="payment_method">

                                <option value="va">
                                    Virtual Account
                                </option>

                                <option value="transfer">
                                    Transfer Bank
                                </option>

                            </select>

                            <small class="text-muted">
                                Detail pembayaran akan dikirimkan melalui Email anda
                            </small>


                            <div class="form-check mt-3">

                                <input class="form-check-input payment-option" type="radio" name="payment_type"
                                    value="full" checked>

                                <label class="form-check-label">
                                    Langsung bayar lunas
                                </label>

                            </div>


                            <div class="form-check mt-3">

                                <input class="form-check-input payment-option" type="radio" name="payment_type"
                                    value="dp">

                                <label class="form-check-label">
                                    Saya bersedia membayar down payment sebesar 50%
                                    dari biaya total sebagai pembayaran pertama,
                                    yang kemudian akan dilunasi pada hari keberangkatan.
                                </label>

                            </div>


                            <button type="submit" class="btn btn-success btn-block mt-4">

                                Konfirmasi Reservasi Paket

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>



    </section>
@endsection
