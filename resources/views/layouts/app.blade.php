<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('img/icon.png') }}">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE-edge"/>
        <meta name="author" content="3rroR" />
        <meta name="description" content="Página para encargar tarjetas de regalo" />
        <meta name="keywords" content="tarjeta, vender, regalo, referido, encargo" />
        <meta name="copyright" content="egc-cuba.com" />
        <meta name="robots" content="index, follow">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    </head>
    <body class="font-sans antialiased">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('includes.navbar')
    @include('includes.sidebar')

    <div class="container text-center">
        @section('content') 
        @show
    </div>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{asset('img/logo.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: La Habana</li>
                            <li>Phone: <a href="tel:+5355016899">+53 55016899</a></li>
                            <li>Email: <a href="mailto:talabas.soporte@gmail.com">talabas.soporte@gmail.com</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed by 3rr0R with Laravel | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="assets/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
            <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/jquery-ui.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/jquery.slicknav.js') }}" defer></script>
        <script src="{{ asset('assets/js/mixitup.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/main.js') }}" defer></script>
    </body>
</html>
