@extends('visitor.layout.app')

@section('content')
    @include('visitor.components.navbar_custom')

    <section class="ftco-section">

        <div class="container">

            <div class="row">

                {{-- LEFT SIDE --}}
                <div class="col-md-6">

                    <h1 class="mb-4">{{ $trip->destination->title }}</h1>

                    <p>
                        <b>Titik Kumpul :</b> {{ $trip->destination->location }}
                    </p>

                    <p>
                        <b>Tanggal Trip :</b>
                        {{ \Carbon\Carbon::parse($trip->trip_date)->format('d F Y') }}
                    </p>

                    <p>
                        <b>Sisa Kuota :</b> {{ $sisaQuota }} orang
                    </p>

                    <p>
                        <b>Jenis Trip :</b> Open
                    </p>

                    <br>

                    <h4>Deskripsi</h4>

                    <p>
                        {{ $trip->destination->description }}
                    </p>


                    {{-- FASILITAS --}}
                    <div class="trip-dropdown">

                        <h4>Fasilitas</h4>
                        <p class="text-muted">Kami menyediakan berbagai fasilitas untuk anda</p>

                        <button class="dropdown-btn" data-toggle="collapse" data-target="#fasilitasList">

                            Tampilkan
                            <i class="fa fa-chevron-down"></i>

                        </button>

                        <div id="fasilitasList" class="collapse mt-3">

                            <ul class="list-group">

                                @foreach ($trip->destination->facilities as $facility)
                                    <li class="list-group-item">
                                        {{ $facility->facility }}
                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    </div>


                    {{-- DESTINASI --}}
                    <div class="trip-dropdown mt-4">

                        <h4>Destinasi</h4>
                        <p class="text-muted">Nikmati destinasi-destinasi pilihan untuk anda</p>

                        <button class="dropdown-btn" data-toggle="collapse" data-target="#destinasiList">

                            Tampilkan
                            <i class="fa fa-chevron-down"></i>

                        </button>

                        <div id="destinasiList" class="collapse mt-3">

                            <ul class="list-group">

                                @foreach ($trip->destination->spots as $spot)
                                    <li class="list-group-item">
                                        {{ $spot->spot_name }}
                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    </div>


                    {{-- ITINERARY --}}
                    <div class="trip-dropdown mt-4">

                        <h4>Itinerary</h4>
                        <p class="text-muted">Rangkaian dan jadwal trip</p>

                        <button class="dropdown-btn" data-toggle="collapse" data-target="#itineraryList">

                            Tampilkan
                            <i class="fa fa-chevron-down"></i>

                        </button>

                        <div id="itineraryList" class="collapse mt-3">

                            <table class="table">

                                <tr>
                                    <th>Waktu</th>
                                    <th>Detail</th>
                                </tr>

                                @foreach ($trip->destination->itineraries as $item)
                                    <tr>
                                        <td>{{ $item->time }}</td>
                                        <td>{{ $item->activity }}</td>
                                    </tr>
                                @endforeach

                            </table>

                        </div>

                    </div>

                </div>




                {{-- RIGHT SIDE --}}
                <div class="col-md-6">

                    <h4 class="mb-3">Gallery</h4>

                    <div class="row">

                        @foreach ($trip->destination->galleries as $gallery)
                            <div class="col-4 mb-3">

                                <img src="{{ asset('images/gallery/' . $gallery->image) }}" class="img-fluid rounded">

                            </div>
                        @endforeach

                    </div>


                    {{-- HARGA --}}
                    <div class="card mt-4">

                        <div class="card-body">

                            <h4>Harga</h4>

                            <p>Dapatkan pengalaman trip terbaik dengan harga terjangkau</p>

                            <table class="table">

                                <tr>
                                    <td>1 Pax</td>
                                    <td>
                                        Rp {{ number_format($trip->destination->price, 0, ',', '.') }}/pax
                                    </td>
                                    <td>Harga Weekend</td>
                                </tr>

                            </table>

                            <a href="{{ route('reservasi.create',$trip->id) }}" class="btn btn-success btn-block">

                                Pesan Paket Ini

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
