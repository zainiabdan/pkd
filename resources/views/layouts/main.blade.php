<!DOCTYPE html>
<html class="no-js" lang="zxx">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="csrf-token" content="{{ csrf_token() }}">

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="{{ URL::asset('kalsel.ico') }}" type="image/x-icon" />

    <title>@yield('title')</title>

    <!--=== Bootstrap CSS ===-->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="{{ URL::asset('assets/css/plugins/slicknav.min.css') }}" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="{{ URL::asset('assets/css/plugins/magnific-popup.css') }}" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="{{ URL::asset('assets/css/plugins/owl.carousel.min.css') }}" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="{{ URL::asset('assets/css/plugins/gijgo.css') }}" rel="stylesheet">
    
    <link href="{{ URL::asset('assets/css/plugins/jquery.datetimepicker.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('assets/fullcalendar/fullcalendar.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('assets/lumino-admin/css/ekko-lightbox.css') }}"  rel="stylesheet" >
    
    {{-- <link href="{{ URL::asset('assets/sweetalert/sweetalert2.min.css') }}"  rel="stylesheet" >
    @include('sweet::alert') --}}

    <!--=== FontAwesome CSS ===-->
    <link href="{{ URL::asset('assets/css/font-awesome.css') }}" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="{{ URL::asset('assets/css/reset.css') }}" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="{{ URL::asset('style.css') }}" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet">
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" /> --}}
    
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="loader-active">
{{-- <body class=""> --}}

     <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="{{ URL::asset('assets/img/loading.gif') }}" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==--> 

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                     <div class="col-lg-3">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ URL::asset('assets/img/logo.png') }}"  width="150" height="auto"  alt="JSOFT">
                        </a>
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> +1 800 345 678
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> Mon-Fri 09.00 - 17.00
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Social Icons Start ==-->
                    <div class="col-lg-3 text-right">
                        <div class="header-social-icons">
                            <a href="#"><i class="fa fa-behance"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!--== Social Icons End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                   <div class="col-lg-0">
                        {{-- <a href="{{ url('/index') }}" class="logo">
                            <img src="{{ URL::asset('assets/img/logo.png') }}"  width="125" height="20"  alt="JSOFT">
                        </a> --}}
                    </div> 
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                        <div class="col-lg-6 d-none d-xl-block">
                            <nav class="mainmenu ">
                                <ul>
                                    <li {{ request()->is('/') ? ' class=active' : '' }}><a href="{{ url('/') }}">Beranda</a></li>
                                    
                                    <li {{ request()->is('about') ? ' class=active' : '' }}><a href="{{ url('/about') }}">Tentang</a></li>
                                    {{-- <li><a href="{{ url('/services') }}">services</a></li> --}}
                                    <li {{ request()->is('contact') ? ' class=active' : '' }}><a href="{{ url('/contact') }}">Contact</a></li>
                                    @if(Auth::check())
                                        <li {{ request()->is('transaksi') ? ' class=active' : '' }}><a href="{{ url('/transaksi') }}">Transaksi</a></li>
                                    @endif
                                    
                                    @if(Auth::check() && Auth::user()->hasRole('driver'))
                                        <li {{ request()->is('driver-task') ? ' class=active' : '' }}><a href="{{ url('/driver-task') }}">Tugas Sopir</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="offset-lg-3 col-lg-3">
                            <nav class="rightmenu mainmenuleft">
                                <ul>
                                  
                                        @if(!Auth::check())
                                        @if(request()->is('login'))
                                        <li><a href="#lgoin-page-wrap">Login</a></li>
                                        @else
                                        <li><a href="{{ url('/login') }}">Login</a></li>
                                        @endif
                                    @else

                                        <div class="profile-userpic">
                                            <img src="{{ Storage::url(Auth::user()->foto_profil) }}" class="img-responsive" alt="">
                                        </div>
                                        <li>
                                            
                                            <a href="{{ url('#') }}">
                                                {{ Auth::user()->name }}
                                            </a>
                                            <ul>
                                                <li><a href="{{ url('/profile' )}}">Profil</a></li>
                                                @if(Auth::check() && Auth::user()->hasRole('admin'))
                                                    <li><a href="{{ url('/dashboard' )}}">Admin</a></li>
                                                @elseif(Auth::check() && Auth::user()->hasRole('superadmin'))
                                                    <li><a href="{{ url('/dashboard' )}}">Super Admin</a></li>
                                                @endif
                                                <li><a class="" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                </li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                </form>
                                            </ul>
                                        </li>

                                  
                                    @endif
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->

    @yield('container')

    <!--== Footer Area Start ==-->
    <section id="footer-area">
        {{-- <!-- Footer Widget Start -->
        <div class="footer-widget-area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>About Us</h2>
                            <div class="widget-body">
                                <img src="{{ URL::asset('assets/img/logo.png') }}" alt="JSOFT">
                                <p>Lorem ipsum dolored is a sit ameted consectetur adipisicing elit. Nobis magni assumenda distinctio debitis, eum fuga fugiat error reiciendis.</p>

                                <div class="newsletter-area">
                                    <form action="index.html">
                                        <input type="email" placeholder="Subscribe Our Newsletter">
                                        <button type="submit" class="newsletter-btn"><i class="fa fa-send"></i></button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->

                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>Recent Posts</h2>
                            <div class="widget-body">
                                <ul class="recent-post">
                                    <li>
                                        <a href="{{ url('#') }}">
                                           Hello Bangladesh! 
                                           <i class="fa fa-long-arrow-right"></i>
                                       </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('#') }}">
                                          Lorem ipsum dolor sit amet
                                           <i class="fa fa-long-arrow-right"></i>
                                       </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('#') }}">
                                           Hello Bangladesh! 
                                           <i class="fa fa-long-arrow-right"></i>
                                       </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('#') }}">
                                            consectetur adipisicing elit?
                                           <i class="fa fa-long-arrow-right"></i>
                                       </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->

                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>get touch</h2>
                            <div class="widget-body">
                                <p>Lorem ipsum doloer sited amet, consectetur adipisicing elit. nibh auguea, scelerisque sed</p>

                                <ul class="get-touch">
                                    <li><i class="fa fa-map-marker"></i> 800/8, Kazipara, Dhaka</li>
                                    <li><i class="fa fa-mobile"></i> +880 01 86 25 72 43</li>
                                    <li><i class="fa fa-envelope"></i> kazukamdu83@gmail.com</li>
                                </ul>
                                <a href="https://goo.gl/maps/b5mt45MCaPB2" class="map-show" target="_blank">Show Location</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->
                </div>
            </div>
        </div>
        <!-- Footer Widget End --> --}}

     <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </section>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="{{ URL::asset('assets/img/scroll-top2.png') }}" alt="JSOFT">
    </div>
    <!--== Scroll Top Area End ==-->



    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="{{ URL::asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="{{ URL::asset('assets/js/jquery-migrate.min.js') }}"></script>
    <!--=== Popper Min Js ===-->
    <script src="{{ URL::asset('assets/js/popper.min.js') }}"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="{{ URL::asset('assets/js/plugins/gijgo.js') }}"></script>
    
    <script src="{{ URL::asset('assets/js/plugins/jquery.datetimepicker.full.min.js') }}"></script>

    <!--=== Vegas Min Js ===-->
    <script src="{{ URL::asset('assets/js/plugins/vegas.min.js') }}"></script>
    <!--=== Isotope Min Js ===-->
    <script src="{{ URL::asset('assets/js/plugins/isotope.min.js') }}"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="{{ URL::asset('assets/js/plugins/owl.carousel.min.js') }}"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="{{ URL::asset('assets/js/plugins/waypoints.min.js') }}"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="{{ URL::asset('assets/js/plugins/counterup.min.js') }}"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="{{ URL::asset('assets/js/plugins/mb.YTPlayer.js') }}"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="{{ URL::asset('assets/js/plugins/magnific-popup.min.js') }}"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="{{ URL::asset('assets/js/plugins/slicknav.min.js') }}"></script>

    <script src="{{ URL::asset('assets/lumino-admin/js/ekko-lightbox.js') }}"></script>
    
    {{-- <script src="{{ URL::asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> --}}
    {{-- <script src="{{ URL::asset('assets/sweetalert/moment.min.js') }}"></script> --}}
    
    <script src="{{ URL::asset('assets/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/fullcalendar/fullcalendar.js') }}"></script>
    <script src="{{ URL::asset('assets/fullcalendar/id.js') }}"></script>
    

{{--     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}


    <!--=== Mian Js ===-->
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>



    {{-- <script>
        @if(session('alert'))
             swal("{{ session('alert') }}");
        @endif
    </script> --}}

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>



    @include('sweetalert::alert')
    @yield('js')

</body>

</html>