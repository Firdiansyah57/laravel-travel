@extends('visitor.layout.app')

@section('content')
    <section class="ftco-section pt-5">

        <div class="container">

            {{-- HEADING --}}
            <div class="row justify-content-center pb-4">

                <div class="col-md-12 heading-section text-center">

                    <span class="subheading">Destination</span>
                    <h2 class="mb-4">Tour Destination</h2>

                </div>

            </div>


            {{-- SEARCH BAR --}}
            <div class="row justify-content-center mb-5">

                <div class="col-md-8">

                    @include('visitor.components.search')

                </div>

            </div>


            {{-- FILTER STATUS --}}
            @if (request('tanggal'))
                <div class="text-center mb-4">

                    <p>

                        Showing trip on :

                        <strong>
                            {{ \Carbon\Carbon::parse(request('tanggal'))->format('d F Y') }}
                        </strong>

                    </p>

                    <a href="{{ route('daftar_trip.index') }}" class="btn btn-sm btn-secondary">

                        Reset Filter

                    </a>

                </div>
            @endif


            {{-- JUMLAH DATA --}}
            @if ($data->count())
                <p class="text-center mb-4">
                    {{ $data->count() }} Trip Available
                </p>
            @endif


            {{-- LIST TRIP --}}
            <div class="row">

                @forelse ($data as $item)
                    <div class="col-md-4 ftco-animate">

                        <div class="project-wrap">

                            <a href="#" class="img"
                                style="background-image:url('{{ asset('images/daftar_trip/' . $item->image) }}')">

                                <span class="price">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </span>

                            </a>

                            <div class="text p-4">

                                <span class="days">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </span>

                                <h3>{{ $item->title }}</h3>

                                <p>Quota : {{ $item->quota }} orang</p>

                                <a href="#" class="btn btn-primary btn-sm">
                                    Book Now
                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-md-12 text-center">
                        <h4>Tidak ada trip pada tanggal tersebut</h4>
                    </div>
                @endforelse

            </div>

        </div>

    </section>
@endsection
