@extends('visitor.layout.app')

@section('content')
    {{-- NAVBAR --}}
    @include('visitor.components.navbar')
    {{-- HERO --}}
    @include('visitor.pages.hero')

    {{-- TENTANG KAMI 2 --}}
    @include('visitor.components.tentang_kami_2')

    {{-- DAFTAR TRIP --}}
    @include('visitor.components.trip_card')

    {{-- TENTANG KAMI 3 --}}
    @include('visitor.components.tentang_kami_3')

    {{-- GALLERY --}}
    @include('visitor.components.gallery_card')
@endsection
