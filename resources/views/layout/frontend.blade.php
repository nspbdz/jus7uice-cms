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

    <!-- Template Main CSS File -->
    <link href="{{asset('frontendTemplate/assets/css/style.css')}}" rel="stylesheet">

    <style>
        /* Styling untuk Weekly News Area */
        .weekly-news-area {
            padding-top: 50px;
        }

        .weekly-wrapper {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        /* Styling untuk Section Title */
        .section-tittle {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-tittle h3 {
            font-size: 24px;
            color: #333;
        }

        /* Styling untuk Weekly News Items */
        .weekly-single {
            margin-right: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .weekly-single:hover {
            transform: translateY(-5px);
        }

        .weekly-img {
            overflow: hidden;
            border-radius: 10px 10px 0 0;
        }

        .weekly-img img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease-in-out;
        }

        .weekly-img img:hover {
            transform: scale(1.1);
        }

        .weekly-caption {
            padding: 15px;
            background-color: #fff;
        }

        .weekly-caption .color1 {
            color: #f45c77;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .weekly-caption h4 {
            font-size: 18px;
            margin-top: 10px;
            margin-bottom: 0;
        }

        /* Styling untuk Dot Navigation */
        .dot-style {
            position: relative;
        }

        .dot-style .owl-dot {
            background-color: transparent;
            border: 2px solid #f45c77;
            display: inline-block;
            height: 10px;
            width: 10px;
            margin-right: 5px;
            border-radius: 50%;
        }

        .dot-style .owl-dot.active {
            background-color: #f45c77;
            border: none;
        }
    </style>
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
                // dd(Request::is(''));
            ?>
            <nav id="navbar" class="navbar">
                <ul>
                    <!-- @foreach($data as $items )
                    <li><a class="nav-link scrollto active" href="${items->url}">{{$items->title}}</a></li>
                    @endforeach -->
                    @foreach($data as $item)
                    <li>
                        <a class="nav-link scrollto {{ Request::is( $item->slug ) ? 'active' : '' }}" href="{{ $item->url }}">
                            {{ $item->title }}
                        </a>
                    </li>
                    @endforeach


                    <!-- <li><a class="nav-link scrollto active" href="/">Home</a></li>
                    <li><a class="nav-link scrollto" href="/about">About</a></li>
                    <li><a class="nav-link scrollto" href="/services">Services</a></li>
                    <li><a class="nav-link   scrollto" href="/portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="/team">Team</a></li> -->
                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> -->
                    <!-- <li><a class="nav-link scrollto" href="/contact">Contact</a></li> -->
                    <!-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->




    <main id="main">

        <div class="main-wrapper main-wrapper-1">

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')

            </div>
            <!--   Weekly-News start -->
            <div class="weekly-news-area pt-50">
                <div class="container">
                    <div class="weekly-wrapper">
                        <!-- section Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle mb-30">
                                    <h3>Weekly Top News</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="weekly-news-active dot-style d-flex dot-style">
                                    <div class="weekly-single">
                                        <div class="weekly-img">
                                            <img src="{{asset('assets/img/news/weeklyNews2.jpg')}}" alt="">
                                        </div>
                                        <div class="weekly-caption">
                                            <span class="color1">Strike</span>
                                            <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                        </div>
                                    </div>
                                    <div class="weekly-single active">
                                        <div class="weekly-img">
                                            <img src="{{asset('assets/img/news/weeklyNews1.jpg')}}" alt="">
                                        </div>
                                        <div class="weekly-caption">
                                            <span class="color1">Strike</span>
                                            <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                        </div>
                                    </div>
                                    <div class="weekly-single">
                                        <div class="weekly-img">
                                            <img src="{{asset('assets/img/news/weeklyNews3.jpg')}}" alt="">
                                        </div>
                                        <div class="weekly-caption">
                                            <span class="color1">Strike</span>
                                            <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                        </div>
                                    </div>
                                    <div class="weekly-single">
                                        <div class="weekly-img">
                                            <img src="{{asset('assets/img/news/weeklyNews1.jpg')}}" alt="">
                                        </div>
                                        <div class="weekly-caption">
                                            <span class="color1">Strike</span>
                                            <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Weekly-News -->
            <br>


            <footer id="footer">

                <div class="footer-newsletter">
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
                </div>

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

</body>

</html>
