<script src="{{ asset('public/frontend_assets/js/jquery.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/plugins.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/progress.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/wow.min.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/viewport.jquery.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/odometer.min.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/nice-select.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/slick.min.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/main.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/frontend_assets/js/fullcalendar.min.js') }}"></script>

<script src="{{ asset('public/frontend_assets/js/sweetalert2.min.js') }}"></script>

<script>

    $(document).ready(function(){
        $('.img-pop').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },
        callbacks: {
            markupParse: function(template, values, item) {
                // Add the text to the modal
                values.title = item.el.attr('data-title');
            },
            elementParse: function(item) {
                item.title = item.el.attr('data-title');
            },
            change: function() {
                $('.mfp-title').remove();
                $('.mfp-content').append('<p class="mfp-title">' + this.currItem.title + '</p>');
            }
        }
    });
        $('.owl-carousel').owlCarousel({
            ltr:true,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            stagePadding:50,
            smartSpeed:2000,
            nav:false,
            dots:false,

            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                },
                1400:{
                    items:6
                }
            }
        })
  });

</script>

<script>


    $(document).ready(function() {
   
    // for Sweet Alert message
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    @if (Session::has('message'))
        Toast.fire({
            icon: 'success',
            title: '{{ Session::get('message') }}',
        });
    @endif
    @if (Session::has('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ Session::get('error') }}',
        });
    @endif
});
</script>