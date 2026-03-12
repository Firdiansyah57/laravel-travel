<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="ftco-search">
                    <div class="tab-wrap">
                        <div class="tab-content">

                            <div class="tab-pane fade show active">

                                <form action="{{ route('trip.destinations') }}" method="GET"
                                    class="search-property-1 w-100">

                                    <div class="row align-items-end">

                                        {{-- INPUT TANGGAL --}}
                                        <div class="col-12 col-md-9">
                                            <div class="form-group">

                                                <label>Pilih Tanggal Trip</label>

                                                <div class="form-field position-relative">

                                                    {{-- <span class="fa fa-calendar search-icon"></span> --}}

                                                    <input type="date" name="tanggal"
                                                        value="{{ request('tanggal') ?? now()->toDateString() }}"
                                                        class="form-control">

                                                </div>

                                            </div>
                                        </div>

                                        {{-- BUTTON SEARCH --}}
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">

                                                <button type="submit" class="btn btn-primary w-100 search-btn">

                                                    Search

                                                </button>

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
</section>
