{{-- CARD DAFTAR TRIP --}}
<section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Destination</span>
                <h2 class="mb-4">Tour Destination</h2>
            </div>
        </div>

        <div class="row">

            @foreach ($data as $item)
                <div class="col-md-4 ftco-animate">

                    <div class="project-wrap">

                        <a href="#" class="img"
                            style="background-image: url('{{ asset('images/daftar_trip/' . $item->image) }}');">

                            <span class="price">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </span>

                        </a>

                        <div class="text p-4">

                            <span class="days">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            </span>

                            <h3>
                                <a href="#">{{ $item->title }}</a>
                            </h3>

                            <p class="location">
                                Quota : {{ $item->quota }} orang
                            </p>

                            <a href="#" class="btn btn-primary">
                                Book Now
                            </a>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        <div class="row mt-4">
            <div class="col-md-12 text-center ftco-animate">

                <a href="{{ route('daftar_trip.index') }}" class="btn btn-primary py-3 px-4">

                    Search Destination

                </a>

            </div>
        </div>

    </div>
</section>
