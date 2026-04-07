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

           @forelse ($data as $item)
                    @php
                        $booked = $item->bookings->sum('qty');
                        $sisaQuota = $item->destination->quota - $booked;
                    @endphp


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

                            {{-- QUOTA --}}
                            <p>
                                Quota :
                                <strong>
                                    {{ $sisaQuota > 0 ? $sisaQuota : 0 }}
                                </strong> orang
                            </p>

                            {{-- BUTTON / STATUS --}}
                            @if ($sisaQuota > 0)
                                <a href="{{ route('trip.detail', $item->id) }}"
                                   class="btn btn-primary btn-sm">
                                    Book Now
                                </a>
                            @else
                                <span class="badge badge-danger">
                                    FULL BOOKED
                                </span>
                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="row mt-4">
            <div class="col-md-12 text-center ftco-animate">

                <a href="{{ route('destinations.index') }}"
                   class="btn btn-primary py-3 px-4">
                    Search Destination
                </a>

            </div>
        </div>

    </div>
</section>
