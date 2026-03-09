<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('images/hero/' . $hero->image) }}');">
    <div class="overlay"></div>
    <div class="container margin-top-5">
        <div class="row no-gutters slider-text js-fullheight align-items-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate" style="margin-top:100px;">
                <span class="subheading">TripGo</span>
                <h1 class="mb-4">{{ $hero->title }}</h1>
                <p class="caps">{{ $hero->sub_title }}</p>
            </div>
            @include('visitor.components.search')
        </div>
    </div>
</div>
