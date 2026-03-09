{{-- <!DOCTYPE html>
<html lang="en">
@include('visitor.partials.head')
<body>
    <!-- NAVBAR -->
 @include('visitor.components.navbar')

 {{-- CONTENT --}}
{{-- @include('visitor.pages.hero')
@include('visitor.pages.tentang_kami_2')
@include('visitor.components.trip_card')
@include('visitor.pages.tentang_kami_3')
@include('visitor.pages.gallery') --}}

{{-- FOOTER --}}

{{-- @include('visitor.components.footer') --}}

{{-- SCRIPT --}}
{{-- @include('visitor.partials.script') --}}

{{-- </body>
</html> --}}


@extends('visitor.layout.app')

@section('content')
    {{-- HERO --}}
    @include('visitor.pages.hero')

    {{-- TENTANG KAMI 2 --}}
    @include('visitor.components.tentang_kami_2')

    {{-- DAFTAR TRIP --}}
    @include('visitor.components.trip_card')

    {{-- TENTANG KAMI 3 --}}
    @include('visitor.components.tentang_kami_3')

    {{-- GALLERY --}}
    @include('visitor.pages.gallery')
@endsection
