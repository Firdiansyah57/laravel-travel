<!-- TENTANG KAMI 2 -->
<section class="ftco-section services-section">
    <div class="container">
        <div class="row">

            <!-- CARD 1 -->
            @foreach ($tentang_kami_2 as $item )
            <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="services services-1 color-1 d-block img"
                    style="background-image: url('{{ asset('images/tentang_kami_2/' . $item->image) }}');">

                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="{{ $item->icon }}"></span>
                    </div>

                    <div class="media-body">
                        <h3 class="heading mb-3">{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- CARD 2 -->
            {{-- <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="services services-1 color-2 d-block img"
                    style="background-image: url('{{ asset('visitor/images/services-2.jpg') }}');">

                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-route"></span>
                    </div>

                    <div class="media-body">
                        <h3 class="heading mb-3">Travel Arrangements</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                    </div>
                </div>
            </div> --}}

            <!-- CARD 3 -->
            {{-- <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="services services-1 color-3 d-block img"
                    style="background-image: url('{{ asset('visitor/images/services-3.jpg') }}');">

                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-tour-guide"></span>
                    </div>

                    <div class="media-body">
                        <h3 class="heading mb-3">Private Guide</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                    </div>
                </div>
            </div> --}}

            <!-- CARD 4 -->
            {{-- <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="services services-1 color-4 d-block img"
                    style="background-image: url('{{ asset('visitor/images/services-4.jpg') }}');">

                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-map"></span>
                    </div>

                    <div class="media-body">
                        <h3 class="heading mb-3">Location Manager</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</section>
