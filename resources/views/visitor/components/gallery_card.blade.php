<section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Gambar</span>
                <h2 class="mb-4">Gallery</h2>
            </div>
        </div>

        <div class="gallery-grid">
            @foreach ($gallery as $item)
                <div class="gallery-item">
                    <div class="gallery-img"
                        style="background-image: url('{{ asset('images/gallery/' . $item->image) }}');">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-md-12 text-center ftco-animate">

                <a href="{{ route('gallery.index') }}" class="btn btn-primary py-3 px-4">
                    Show Gallery
                </a>

            </div>
        </div>

    </div>
</section>

