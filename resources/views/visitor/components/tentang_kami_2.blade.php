<!-- TENTANG KAMI -->
<section class="about-features py-5">
    <div class="container">
        <div class="row text-center justify-content-center">

            @foreach ($tentang_kami_2 as $item)
            <div class="col-6 col-md-4 col-lg mb-4">

                <div class="feature-box">

                    <!-- ICON -->
                    <div class="feature-icon">
                        <img src="{{ asset('images/tentang_kami_2/' . $item->icon) }}"
                             alt="">
                    </div>

                    <!-- TITLE -->
                    <h5 class="feature-title">
                        {{ $item->title }}
                    </h5>

                    <!-- DESCRIPTION -->
                    <p class="feature-desc">
                        {{ $item->description }}
                    </p>

                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>
