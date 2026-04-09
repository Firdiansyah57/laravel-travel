<footer id="footer" class="exotic-footer">
    <div class="container">
        <div class="row footer-content">
            <div class="col-md-4 mb-4">
                <div class="footer-widget">
                    <div class="footer-logo mb-3 d-flex align-items-center">
                        <img src="{{ asset('images/logo2.png') }}" alt="Logo" style="width:100px; margin-right:10px;">
                        <span class="brand-name">TripGo</span>
                    </div>
                    <p class="address">
                        Yogyakarta, Indonesia<br>
                        Travel Agency & Tour Organizer<br>
                        Indonesia Destination Specialist
                    </p>
                    <p class="phone">
                        <i class="fa fa-phone mr-2"></i> +62812-1908-9940
                    </p>
                </div>
            </div>

            <div class="col-md-2 mb-4">
                <div class="footer-widget">
                    <h3 class="widget-title">Navigasi</h3>
                    <ul class="list-unstyled" >
                        <li><a href="{{ route('destinations.index') }}" style="font-size: 20px">Daftar Trip</a></li>
                        <li><a href="{{ route('gallery.index') }}" style="font-size: 20px">Gallery</a></li>
                        <li><a href="{{ route('tentang_kami.index' ) }}" style="font-size: 20px">Tentang Kami</a></li>
                        <li><a href="#footer" style="font-size: 20px">Privacy Police</a></li>

                    </ul>
                </div>
            </div>

            <div class="col-md-2 mb-4">
                <div class="footer-widget">
                    <h3 class="widget-title">Ikuti Kami</h3>
                    <ul class="list-unstyled social-links">
                        <li><a href="#" style="font-size: 20px"><i class="fa fa-instagram"></i> Instagram</a></li>
                        <li><a href="#" style="font-size: 20px"><i class="fa fa-tiktok"></i> Tiktok</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="footer-widget">
                    <h3 class="widget-title">Unduh Aplikasi</h3>
                    <div class="app-buttons">
                        <a href="#footer" class="app-btn">
                            <i class="fa fa-play mr-2"></i>
                            <span>Unduh di<br><b>Google Play</b></span>
                        </a>
                        <a href="#footer" class="app-btn">
                            <i class="fa fa-apple mr-2"></i>
                            <span>Unduh di<br><b>App Store</b></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom text-center">
            <p>&copy; 2026 • <b>PT. TripGo.</b> All rights reserved.</p>
        </div>
    </div>
</footer>
