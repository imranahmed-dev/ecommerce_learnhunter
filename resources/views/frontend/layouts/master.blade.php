<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | Eceommerce Laravel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/bootstrap4/bootstrap.min.css">
    <link href="{{asset('frontend')}}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/responsive.css">


    <!-- Frontend dashboard css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/dashboard')}}/css/dashboard.css">
    <!-- Toastr -->
    <link href="{{asset('defaults/toastr/toastr.min.css')}}" rel="stylesheet" />
    

</head>

<body>
    <div class="super_container">
        <!-- Header -->
        @include('frontend.layouts.header')

        @yield('content')

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 footer_col">
                        <div class="footer_column footer_contact">
                            <div class="logo_container">
                                <div class="logo"><a href="#">OneTech</a></div>
                            </div>
                            <div class="footer_title">Got Question? Call Us 24/7</div>
                            <div class="footer_phone">+38 068 005 3570</div>
                            <div class="footer_contact_text">
                                <p>17 Princess Road, London</p>
                                <p>Grester London NW18JR, UK</p>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 offset-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Find it Fast</div>
                            <ul class="footer_list">
                                <li><a href="#">Computers & Laptops</a></li>
                                <li><a href="#">Cameras & Photos</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Smartphones & Tablets</a></li>
                                <li><a href="#">TV & Audio</a></li>
                            </ul>
                            <div class="footer_subtitle">Gadgets</div>
                            <ul class="footer_list">
                                <li><a href="#">Car Electronics</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <ul class="footer_list footer_list_2">
                                <li><a href="#">Video Games & Consoles</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Cameras & Photos</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Computers & Laptops</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Customer Care</div>
                            <ul class="footer_list">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order Tracking</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">Customer Services</a></li>
                                <li><a href="#">Returns / Exchange</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Product Support</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                            <div class="copyright_content">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img src="{{asset('frontend')}}/images/logos_1.png" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('frontend')}}/images/logos_2.png" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('frontend')}}/images/logos_3.png" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('frontend')}}/images/logos_4.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('frontend')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('frontend')}}/styles/bootstrap4/popper.js"></script>
    <script src="{{asset('frontend')}}/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/greensock/TweenMax.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/greensock/TimelineMax.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/greensock/animation.gsap.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="{{asset('frontend')}}/plugins/slick-1.8.0/slick.js"></script>
    <script src="{{asset('frontend')}}/plugins/easing/easing.js"></script>
    <script src="{{asset('frontend')}}/js/custom.js"></script>
    @yield('customjs')

    <!-- Sweetalert -->
    <script src="{{asset('defaults/sweetalert/sweetalert2@9.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('defaults/toastr/toastr.min.js')}}"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}"

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>

    <script>
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!',
                        'Data has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
</body>

</html>