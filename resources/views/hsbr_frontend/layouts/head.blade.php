<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title> HSBR Apps </title>
<!-- favicons Icons -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('app/images/logo/hsbr_logo_icon.png') }}" />
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('app/images/logo/hsbr_logo_icon.png') }}" />
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('app/images/logo/hsbr_logo_icon.png') }}" />
<link rel="manifest" href="{{ asset('frontend/hsbr/assets/images/favicons/site.webmanifest') }}" />
<meta name="description" content="pitoon HTML 5 Template " />

<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap"
    rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">




<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/animate/custom-animate.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/fontawesome/css/all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/jarallax/jarallax.css') }}" />
<link rel="stylesheet"
    href="{{ asset('frontend/hsbr/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/nouislider/nouislider.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/nouislider/nouislider.pips.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/odometer/odometer.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/swiper/swiper.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/pitoon-icons/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/reey-font/stylesheet.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/bxslider/jquery.bxslider.css') }}" />
<link rel="stylesheet"
    href="{{ asset('frontend/hsbr/assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/vegas/vegas.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/jquery-ui/jquery-ui.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/timepicker/timePicker.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/vendors/ion.rangeSlider/css/ion.rangeSlider.min.css') }}">

<!-- template styles -->
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/css/pitoon.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/css/pitoon-responsive.css') }}" />

@if ($bootSettings['hsbr_frontend_layout_dark_mode'] == 1)
    <link rel="stylesheet" href="{{ asset('frontend/hsbr/assets/css/pitoon-dark.css') }}" />
@endif

<!-- Bootstrap 4 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery and Bootstrap 4 JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@section('head_links')
@show
