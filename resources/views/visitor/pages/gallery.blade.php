@extends('visitor.layout.app')

@section('content')

@include('visitor.components.navbar_custom')

    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Gambar</span>
                    <h2 class="mb-4">Gallery</h2>
                </div>
            </div>

            <div class="gallery-grid">
                @foreach($gallery as $item)
<div class="gallery-item">

    <a href="{{ asset('images/gallery/' . $item->image) }}"
       class="glightbox"
       data-gallery="trip-gallery">

        <div class="gallery-img"
            style="background-image: url('{{ asset('images/gallery/' . $item->image) }}');">
        </div>

    </a>

</div>
@endforeach
            </div>


        </div>
    </section>


@endsection
