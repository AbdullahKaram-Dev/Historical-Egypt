@extends('back-end.layout.layout')
@section('content')
    <br>
    <section class="singlepost" >

        <div class="row">


    <div class="col-md-4 col-lg-4 col-12 photo" >
        <img src="{{asset('uploads/'.$singlepost->img.'')}}" height="400px" width="400px">
    </div>
        <br>


    <div class="col-md-8 col-lg-8 col-12" >
        <h1 class="text-center">{{$singlepost->title}}</h1>
        <p>

           {!!$singlepost->post!!}

        </p>

    </div>
        </div>
    </section>

@endsection
