<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('back/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/bower_components/bootstrap/dist/css/singlepost.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('back/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('back/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('back/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('back/dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('back/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('back/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('back/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('back/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    {{--<link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('back/comments/comments.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>




@php


   if(request()->route()->uri == "admin/pharaonics"){
    $class="pharaonics";

   }elseif(request()->route()->uri == "admin/pharaonics/create"){
    $class="pharaonics";

   }elseif(request()->route()->uri == "admin/pharaonics/{pharaonic}/edit"){
    $class="pharaonics";

   }elseif(request()->route()->uri == "admin/coptics"){
    $class="coptics";

   }elseif(request()->route()->uri == "admin/coptics/create"){
    $class="coptics";

   }elseif(request()->route()->uri == "admin/coptics/{coptic}/edit"){
    $class="coptics";

   }elseif(request()->route()->uri == "admin/islamics"){
    $class="islamics";

   }elseif(request()->route()->uri == "admin/islamics/create"){
    $class="islamics";

   }elseif(request()->route()->uri == "admin/islamics/{islamic}/edit"){
    $class="islamics";

   }elseif(request()->route()->uri == "admin/moderns"){
    $class="moderns";

   }elseif(request()->route()->uri == "admin/moderns/create"){
    $class="moderns";

   }elseif(request()->route()->uri == "admin/moderns/{modern}/edit"){
    $class="moderns";

   }elseif(request()->route()->uri == "admin/home"){
    $class="back-body";

   }else{
    $class="back-body";

   }
@endphp

<body class="hold-transition skin-blue sidebar-mini back-body {{ $class }}" >
    <div class="back-photo"></div>



    {{-- pre loder --}}
<div class="loader">

    <img src="{{ asset('front/photo/gif/1.gif') }}" width="10%" alt="">
 
</div>


<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/admin/home')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">BE</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Dashboard</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- Notifications: style can be found in dropdown.less -->
                    <!-- Tasks: style can be found in dropdown.less -->
                    <!-- User Account: style can be found in dropdown.less -->
                    <ul class="navbar-nav ml-auto dropdown" >
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                          
                               
                            
                            <div class="dropdown">
                    
                                <a id="navbarDropdown"class="btn  dropdown-toggle text-black" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </ul>
                              </div>
                                @endguest

                    </ul>
                  
               
                </ul>
            </div>
        </nav>
    </header>
    
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar" >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('UsersImage/'.auth()->user()->image)}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <h4 style="color: #fef4a1;font-weight: 600;">{{ auth()->user()->name }}</h4>
                    {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
                </div>
            </div>
            <!-- search form -->


            @yield('search')
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            @include('back-end.layout.side-bar')


        </section>
        <!-- /.sidebar -->
    </aside>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper " >

        <!-- Content Header (Page header) -->
        <section class="content-header text-white">
            <h1>
                {{ $title }}
            </h1>

        </section>

        <!-- Main content -->

        {{--@if ($errors->any())--}}
            {{--<div class="alert alert-danger">--}}
                {{--<ul>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}
        @yield('content')

        <!-- /.content -->
    </div>

    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('back/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('back/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('back/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('back/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('back/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('back/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('back/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('back/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('back/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('back/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('back/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('back/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('back/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('back/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('back/dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('back/dist/js/search.js')}}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('back/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('back/dist/js/demo.js')}}"></script>
<script src="{{asset('back/bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('front/js/script.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @include('sweet::alert')


{{-- <script>
    $(function () {
        Replace the <textarea id="editor1"> with a CKEditor
        instance, using default configuration.
        CKEDITOR.replace('editor1')
        bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script> --}}
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
  </script>
</body>
</html>
