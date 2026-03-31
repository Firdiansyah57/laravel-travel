@extends('visitor.layout.app')

@section('content')
@include('visitor.components.navbar_custom')

    <section class="ftco-section ">

        <div class="container">

            <div class="row justify-content-center pb-4">

                <div class="col-md-12 heading-section">
                    <span class="subheading"></span>
                    <h2 class="mb-4">Tentang Kami</h2>
                    <p style="text-align: justify">@TripGo adalah merek PT. FH Group sejak 2026, travel agency profesional
                        yang siap membawa pengalaman perjalanan tak terlupakan ke destinasi eksotik. Dengan ribuan pelanggan
                        yang telah mempercayakan perjalanan mereka bersama kami, TripGo selalu berkomitmen untuk memberikan
                        pelayanan terbaik, ramah, dan profesional.

                    <p style="text-align: justify">Kami tidak hanya menawarkan perjalanan, tetapi juga dokumentasi trip
                        berkualitas tinggi yang akan mengabadikan setiap momen indah selama perjalanan Anda. Dengan tim
                        fotografer dan videografer berpengalaman, setiap momen petualangan Anda akan terekam dengan
                        sempurna. Selain itu, kami memahami pentingnya anggaran dalam setiap perjalanan. Oleh karena itu,
                        TripGo hadir dengan harga trip yang ramah di kantong tanpa mengurangi kualitas layanan dan
                        kenyamanan yang Anda dapatkan. Bersama @TripGo, jadikan setiap perjalanan lebih berkesan, seru, dan
                        pastinya penuh kenangan indah.</p>
                    @foreach ($tentang_kami as $item)
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate">
                                <a href="{{ $item->link }}">
                                    <span class="{{ $item->icon }}"></span>
                                </a>
                            </li>
                        </ul>
                    @endforeach

                    {{-- <li class="ftco-animate"><a href="#"><span class="fa fa-whatsapp"></span></a></li> --}}

                </div>

            </div>


        </div>

    </section>

    @include('visitor.components.tentang_kami_2')

    @include('visitor.components.tentang_kami_3')
@endsection
