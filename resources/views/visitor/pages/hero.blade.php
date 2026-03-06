<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('images/hero/' . $hero->image) }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <br>
                <br>
                <br>
                <br>
                <br>
                <span class="subheading">TripGo</span>
                <h1 class="mb-4">{{ $hero->title }}</h1>
                <p class="caps">{{ $hero->sub_title }}</p>
            </div>
            @include('visitor.pages.search')
        </div>
    </div>
</div>
