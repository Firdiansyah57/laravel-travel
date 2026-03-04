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


    {{-- GALLERY --}}
    @include('visitor.pages.gallery')
@endsection
