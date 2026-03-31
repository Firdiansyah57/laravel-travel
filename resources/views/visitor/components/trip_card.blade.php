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

                        <a href="{{ route('trip.detail', $item->id) }}" class="img"
                            style="background-image:url('{{ asset('images/destinations/' . $item->destination->image) }}')">

                            <span class="price">
                                Rp {{ number_format($item->destination->price, 0, ',', '.') }}
                            </span>

                        </a>

                        <div class="text p-4">

                            <span class="days">
                                {{ \Carbon\Carbon::parse($item->trip_date)->format('d M Y') }}
                            </span>

                            <h3>{{ $item->destination->title }}</h3>

                            <p>Quota : {{ $item->quota }} orang</p>

                            <a href="{{ route('trip.detail', $item->id) }}" class="btn btn-primary btn-sm">
                                Book Now
                            </a>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

        <div class="row mt-4">
            <div class="col-md-12 text-center ftco-animate">

                <a href="{{ route('destinations.index') }}" class="btn btn-primary py-3 px-4">
                    Search Destination
                </a>

            </div>
        </div>

    </div>
</section>
