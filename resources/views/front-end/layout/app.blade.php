<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('front/css/normaliz.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Bangers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    @if(request()->route()->uri == "/")
    <link rel="stylesheet" href="{{asset('front/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/global.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('front/css/bootstrap4.min.css')}}"> --}}
    @else
    <link rel="stylesheet" href="{{asset('front/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/global.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/sectionpage.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/singlepost.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/contact-us.css')}}">

    @endif
</head>
<body>
{{-- pre loder --}}
  <div class="loader">
    <img src="{{ asset('front/photo/gif/1.gif') }}" width="10%" alt="">
</div>
@if(request()->route()->uri == "/")
    <!--start slider-->
    <div class="slider">
        <div class="again">
            <div class="owl-carousel">
                @foreach($sliders as $slider)
                <div class="againi"> <img height="442px;" src="{{asset('Sliders/'.$slider->img.'')}}" alt=""></div>
                    @endforeach
              </div>
        </div>
        <div class="text pull-right">
            <h1 class="text-uppercase text-center" id="spring"></h1>
            <p class="p-r" id="pr"></p>
        </div>
    </div>
@endif
@include('front-end.layout.nav-bar')
@yield('content')
@include('front-end.layout.footer')
@if(request()->route()->uri == "/")
<script src="{{asset('front/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/all.min.js')}}"></script>
<script src="{{asset('front/js/plugin.js')}}"></script>
<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/js/script.js')}}"></script>
<script>
    $(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    items: 1,
        autoplay: true,
        loop:true,
        margin:10,
        autoPlaySpeed: 4000,
        autoplayHoverPause:true
        // autoplayHoverPause: true
  });
});
</script>
@else
    <script>
        //islamic Route For AJAX
        var urll_dislike = "{{route('dislike.islamic')}}";
        var urll = "{{route('likee.islamic')}}";
            // end Islamic Route
        /////////////////////////////////////////////////////
        //Coptic Route For AJAX
        var url_dislike = "{{route('dislike.add')}}";
        var url = "{{route('like.add')}}";
        // end Coptic Route
        ///////////////////////////////////////////
        //Modern Route For AJAx
        var url_modern = "{{route('likee.modern')}}";
        var urll_modern = "{{route('dislike.modern')}}";
        // End Modern Route
        /////////////////////////////////////
        //pharaonic Route For AJAx
        var url_pharaonic = "{{route('likee.pharaonic')}}";
        var urll_pharaonic = "{{route('dislike.pharaonic')}}";
        // End pharaonic Route
        var token = "{{Session::token()}}";
    </script>
<script src="{{asset('front/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/pinterest_grid.min.js')}}"></script>
<script src="{{asset('front/js/all.min.js')}}"></script>
<script src="{{asset('front/js/sectionpage.js')}}"></script>
<script src="{{asset('front/js/singlepost.js')}}"></script>
<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/js/script.js')}}"></script>
<script src="{{asset('front/js/coptic.js')}}"></script>
<script src="{{asset('front/js/pharaonic.js')}}"></script>
<script src="{{asset('front/js/islamic.js')}}"></script>
<script src="{{asset('front/js/modern.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')

@endif
</body>
</html>
