<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="ftco-search">

                    <div class="tab-wrap">

                        <div class="tab-content">

                            <div class="tab-pane fade show active">

                                <form action="{{ route('daftar_trip.index') }}" method="GET"
                                    class="search-property-1 w-100">

                                    <div class="row no-gutters">

                                        {{-- INPUT TANGGAL --}}
                                        <div class="col-md-10 d-flex">

                                            <div class="form-group p-4 border-0 w-100">

                                                <label>Pilih Tanggal Trip</label>

                                                <div class="form-field">

                                                    <div class="icon">
                                                        <span class="fa fa-calendar"></span>
                                                    </div>

                                                    <input type="date" name="tanggal"
                                                        value="{{ request('tanggal') }}" class="form-control">

                                                </div>

                                            </div>

                                        </div>

                                        {{-- BUTTON SEARCH --}}
                                        <div class="col-md-2 d-flex">

                                            <div class="form-group p-4 border-0 w-100">

                                                <label style="opacity:0;">Search</label>

                                                <input type="submit" value="Search"
                                                    class="form-control btn btn-primary">

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
</section>
