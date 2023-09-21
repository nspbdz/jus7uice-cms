<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tuntaz</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <!-- <link rel="stylesheet" href="{{asset('frontendTemplate/assets/modules/datatables/datatables.min.css')}}"> -->

    <link href="{{asset('frontendTemplate/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('frontendTemplate/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontendTemplate/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('frontendTemplate/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontendTemplate/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontendTemplate/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('frontendTemplate/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- frontend news -->
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/ticker-style.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontendTemplate/aznews-master/assets/css/style.css')}}">
    <!-- frontend news -->

    <!-- Template Main CSS File -->
    <link href="{{asset('frontendTemplate/assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <?php
            // dd($widget);
            // dd(Request::is(''));
            ?>
            <nav id="navbar" class="navbar">
                <ul>
                    <!-- @foreach($data as $items )
                    <li><a class="nav-link scrollto active" href="${items->url}">{{$items->title}}</a></li>
                    @endforeach -->
                    @foreach($data as $item)
                    <li>
                        <a class="nav-link scrollto {{ Request::is( $item->url ) ? 'active' : '' }}" href="{{ $item->url }}">
                            {{ $item->page }}
                        </a>
                    </li>
                    @endforeach

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->




    <main id="main">

        <div class="main-wrapper main-wrapper-1">

            <!-- Main Content -->
            <div class="main-content">

            @if( $canWidgetBanner == null  || $canWidgetBanner->isEmpty() )
            <!-- <p>Tidak ada data yang ditemukan.</p> -->
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
               
            </div>

            @else

            <div class="row">
                <div class="col-md-8">
                    @yield('content')

                </div>
                <div class="col-md-4">
                    <br><br>
                    <br><br>
                    @widget('BannerNews')

                </div>
            </div>
            @endif
            </div>



            <br><br>
            <?php
            // dd($dataWidget);
            // dd($canWidgetBanner);
            ?>
            @if( $canWidgetWeeklyNews == null  || $canWidgetWeeklyNews->isEmpty() )
            @else
            <div>
                @widget('WeeklyNews')
            </div>
            @endif

            
            @widget('WidgetNews')


            <footer id="footer">

                <!-- <div class="footer-newsletter">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <h4>Join Our Newsletter</h4>
                                <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                                <form action="" method="post">
                                    <input type="email" name="email"><input type="submit" value="Subscribe">
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="footer-top">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-3 col-md-6 footer-contact">
                                <h3>Arsha</h3>
                                <p>
                                    A108 Adam Street <br>
                                    New York, NY 535022<br>
                                    United States <br><br>
                                    <strong>Phone:</strong> +1 5589 55488 55<br>
                                    <strong>Email:</strong> info@example.com<br>
                                </p>
                            </div>

                            <div class="col-lg-3 col-md-6 footer-links">
                                <h4>Useful Links</h4>
                                <ul>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 footer-links">
                                <h4>Our Services</h4>
                                <ul>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 footer-links">
                                <h4>Our Social Networks</h4>
                                <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container footer-bottom clearfix">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </footer><!-- End Footer -->

            <div id="preloader"></div>
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

            <!-- Vendor JS Files -->
            <script src="{{asset('frontendTemplate/assets/vendor/aos/aos.js')}}"></script>
            <script src="{{asset('frontendTemplate/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('frontendTemplate/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
            <script src="{{asset('frontendTemplate/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
            <script src="{{asset('frontendTemplate/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
            <script src="{{asset('frontendTemplate/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
            <script src="{{asset('frontendTemplate/assets/vendor/php-email-form/validate.js')}}"></script>

            <!-- Template Main JS File -->
            <script src="{{asset('frontendTemplate/assets/js/main.js')}}"></script>



            <!-- frontend news -->
            <!-- JS here -->

            <!-- All JS Custom Plugins Link Here here -->
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
            <!-- Jquery, Popper, Bootstrap -->
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/popper.min.js')}}"></script>
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/bootstrap.min.js')}}"></script>
            <!-- Jquery Mobile Menu -->
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/jquery.slicknav.min.js')}}"></script>

            <!-- Jquery Slick , Owl-Carousel Plugins -->
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/owl.carousel.min.js')}}"></script>
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/slick.min.js')}}"></script>
            <!-- Date Picker -->
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/gijgo.min.js')}}"></script>
            <!-- One Page, Animated-HeadLin -->
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/wow.min.js')}}"></script>
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/animated.headline.js')}}"></script>
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/jquery.magnific-popup.js')}}"></script>

            <!-- Breaking New Pluging -->
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/jquery.ticker.js')}}"></script>
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/site.js')}}"></script>

            <!-- Scrollup, nice-select, sticky -->
            <script src="{{asset('frontendTemplate/aznews-master/assets/js/jquery.scrollUp.min.js"></script>
        <script src="{{asset('frontendTemplate/aznews-master/assets/js/jquery.nice-select.min.js"></script>
		<script src="{{asset('frontendTemplate/aznews-master/assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="{{asset('frontendTemplate/aznews-master/assets/js/contact.js"></script>
        <script src="{{asset('frontendTemplate/aznews-master/assets/js/jquery.form.js"></script>
        <script src="{{asset('frontendTemplate/aznews-master/assets/js/jquery.validate.min.js"></script>
        <script src="{{asset('frontendTemplate/aznews-master/assets/js/mail-script.js"></script>
        <script src="{{asset('frontendTemplate/aznews-master/assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{asset('frontendTemplate/aznews-master/assets/js/plugins.js"></script>
        <script src="{{asset('frontendTemplate/aznews-master/assets/js/main.js"></script>
        
            <!-- frontend news -->

</body>

</html>