<script src="{{ asset('visitor/js/jquery.min.js') }}"></script>
<script src="{{ asset('visitor/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('visitor/js/popper.min.js') }}"></script>
<script src="{{ asset('visitor/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('visitor/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('visitor/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('visitor/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('visitor/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('visitor/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('visitor/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('visitor/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('visitor/js/scrollax.min.js') }}"></script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s"></script>
<script src="{{ asset('visitor/js/google-map.js') }}"></script> --}}
<script src="{{ asset('visitor/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
    const lightbox = GLightbox({
        selector: '.glightbox'
    });
</script>

@isset($trip)
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const dpRow = document.getElementById("dpRow");
        const paymentOptions = document.querySelectorAll(".payment-option");
        const qtyInput = document.getElementById("qtyInput");
        const totalPrice = document.getElementById("totalPrice");
        const summaryTotal = document.getElementById("summaryTotal");
        const dpPrice = document.getElementById("dpPrice");
        const paxText = document.getElementById("paxText");

        if (!dpRow || paymentOptions.length === 0) return;

        function toggleDP() {

            const selected = document.querySelector(".payment-option:checked");

            if (selected.value === "dp") {

                dpRow.style.display = "flex";

            } else {

                dpRow.style.display = "none";

            }

        }

        // jalankan saat load
        toggleDP();

        // jalankan saat radio berubah
        paymentOptions.forEach(function(option) {
            option.addEventListener("change", toggleDP);
        });


        if (!qtyInput) return;

        const price = {{ $trip->destination->price }};

        function updatePrice() {

            let qty = parseInt(qtyInput.value);

            let total = price * qty;
            let dp = total / 2;

            paxText.innerText = qty + " Pax";

            totalPrice.innerText = total.toLocaleString("id-ID");
            summaryTotal.innerText = total.toLocaleString("id-ID");
            dpPrice.innerText = dp.toLocaleString("id-ID");

        }

        qtyInput.addEventListener("input", updatePrice);

        updatePrice();

    });
</script>
@endisset
