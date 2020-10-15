<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Personal Website </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('assets/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('assets/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('assets/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('assets/css/slick.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('assets/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}">
            <link rel="stylesheet" href="{{ URL::asset('frontend/css/custom.css')}}">
   </head>

   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
     @include('frontend.partials.header')


    @yield('content')



    <footer>
        <!-- Footer Start-->
        <div class="footer-area">
            <div class="container">

                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="footer-copy-right">
                                <p>Copyright &copy;All rights reserved</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <a>Stay Connected</a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ URL::asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ URL::asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/popper.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ URL::asset('assets/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ URL::asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/slick.min.js')}}"></script>
		<!-- One Page, Anated-HeadLin -->
        <script src="{{ URL::asset('assets/js/wow.min.js')}}"></script>
		     <script src="{{ URL::asset('assets/js/animated.headline.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.magnific-popup.js')}}"></script>

		<!-- Nice-select, sticky -->
        <script src="{{ URL::asset('assets/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{ URL::asset('assets/js/jquery.sticky.js')}}"></script>

        <!-- contact js -->
        <script src="{{ URL::asset('assets/js/contact.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.form.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/mail-script.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>

		<!-- Jquery Plugins, main Jquery -->
        <script src="{{ URL::asset('assets/js/plugins.js')}}"></script>
        <script src="{{ URL::asset('assets/js/main.js')}}"></script>
        <script src="{{ URL::asset('frontend/js/isotop.js')}}"></script>
        <script src="{{ URL::asset('frontend/js/custom.js')}}"></script>

    @include('sweetalert::alert')
    </body>
</html>
