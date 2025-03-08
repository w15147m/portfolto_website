<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mosaic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolioThemes/css/style.css') }}">
    @vite(['resources/assets/sass/app.scss','resources/assets/css/app.css'])
</head>

<body>


  
    {{-- Include Home Slider --}}
    @include('portfolioThemes.partials.navbar' )
    @include('portfolioThemes.components.home-slider' , ['portfolios' => $portfolios])
    @include('portfolioThemes.components.about-section')
    @include('portfolioThemes.components.services-section' , ['services' => $portfolios->services] )
    {{-- @include('portfolioThemes.components.counter-stats') --}}
    @include('portfolioThemes.components.projects-section')
    @include('portfolioThemes.components.work-showcase')
    @include('portfolioThemes.components.client-section')
    @include('portfolioThemes.components.customer-feedback')
    @include('portfolioThemes.components.team')
    @include('portfolioThemes.partials.footer')






 

   


  

 

    

    



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('portfolioThemes/js/jquery.min.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/popper.min.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/aos.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/jquery.timepicker.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('portfolioThemes/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/google-map.js') }}"></script>
    <script src="{{ asset('portfolioThemes/js/main.js') }}"></script>

</body>

</html>
