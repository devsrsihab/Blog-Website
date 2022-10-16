<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="meta_description" content="@yield('meta_description')">
    <meta name="meta_keyword" content="@yield('meta_keyword')">

    <!-- Fonts -->
    @php
        $setting = App\Models\settings::find(1);
    @endphp
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/settings/'.$setting->favicon) }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this page -->
    {{-- summer note css --}}
    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/summernote-lite.min.css') }}" rel="stylesheet">
    {{-- owl carousel --}}
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/sb-admin-2.css') }}">
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>
<body>
    <div id="app">
        @include('layouts.inc.frontendNavbar')
        <main class="">
            @yield('content')
        </main>
        @include('layouts.inc.frontendFooter')
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    {{-- <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
    {{-- owl carousel js --}}
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    {{-- summer note js --}}
    <script src="{{ asset('assets/js/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#my_summernote").summernote({
                height: 200,
            });
            $("#my_summernote2").summernote({
                height: 200,
            });
            $('.dropdown-toggle').dropdown();
            
            // owl carousel
            $('.categorie_carousel').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:true,
                    autoplay:true,
                    autoplayTimeout:2000,


                    responsive:{
                        0:{
                            items:2
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:5
                        }
                    }
                })


            });
        
    </script>
    @yield('script')
</body>
</html>
