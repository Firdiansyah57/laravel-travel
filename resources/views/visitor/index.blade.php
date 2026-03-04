@extends('visitor.layout.app')

@section('content')
    {{-- HERO --}}
    @include('visitor.pages.hero')

    {{-- TENTANG KAMI 2 --}}
    @include('visitor.pages.tentang_kami_2')

    {{-- DAFTAR TRIP --}}
    @include('visitor.pages.daftar_trip')

    {{-- TENTANG KAMI 3 --}}
    @include('visitor.pages.tentang_kami_3')

    {{-- <section class="ftco-intro ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="img" style="background-image: url(images/bg_2.jpg);">
                        <div class="overlay"></div>
                        <h2>We Are Pacific A Travel Agency</h2>
                        <p>We can manage your dream building A small river named Duden flows by their place</p>
                        <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Ask For A Quote</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- GALLERY --}}
    @include('visitor.pages.gallery')
@endsection
