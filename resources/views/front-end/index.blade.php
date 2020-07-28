@extends('front-end.layout.app')
@section('content')
    <div class="content">

        <div class="all">

            <div class="first">
                <div class="container">
                    @foreach ($rows as $row)

                        <h2 class="text-capitalize text-center h2-custom">{{ $row->title }}</h2>
                        <p class="p-r">{!!$row->content!!}</p>
                    @endforeach

                </div>
            </div>

            <div class="second">
                <div class="container">
                    <div class="labell text-center">
                        <span class="text-capitalize">Pharaonic</span>
                    </div>
                    <div class="count">
                        <div class="side pull-left text-center">
                            @foreach ($Pharaonic as $row)

                                <span @if($row->id == 1) class="active"
                                      @endif data-num="r{{ $row->id }}">{{ $row->id }}</span>
                            @endforeach

                        </div>

                        @foreach ($Pharaonic as $row)

                            <div class="post one pull-left @if($row->id == 1) active @endif" id="r{{ $row->id }}">

                                <div class="info pull-left">
                                    <h3 class="text-center">{{ $row->title }}</h3>
                                    <p class="p-r">{{ $row->post }} </p>
                                </div>
                                <div class=" pull-left">
                                    <img class="photo" src="{{asset("uploads/$row->img")}}" alt="">
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="view text-center">
                        <span><a href="{{url('/pharaonic')}}">More</a></span>
                    </div>
                </div>
            </div>

            <div class="third">
                <div class="container">
                    <div class="labell-third text-center">
                        <span class="text-capitalize">Islamic</span>
                    </div>
                    <div class="count-third">
                        <div class="side-third pull-right text-center">
                            @foreach ($Islamic as $row)

                                <span @if($row->id == 1) class="active"
                                      @endif data-num="i{{ $row->id }}">{{ $row->id }}</span>
                            @endforeach
                        </div>
                        @foreach ($Islamic as $row)

                            <div class="post-third one-third pull-right @if($row->id == 1) active @endif "
                                 id="i{{ $row->id }}"><!--post one-->
                                <div class="info-third pull-left"><!--info-->
                                    <h3 class="text-center">{{ $row->title }}</h3>
                                    <p class="p-r">{{ $row->post }} </p>
                                </div>
                                <div class=" pull-left">
                                    <img class="photo" src="{{asset("uploads/$row->img")}}" alt="">

                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="view-third text-center"><!--view-->
                        <span><a href="{{url('/islamic')}}">More</a></span>
                    </div>
                </div>
            </div>

            <div class="fourty">
                <div class="container">
                    <div class="labell-fourty text-center">
                        <span class="text-capitalize">modern</span>
                    </div>
                    <div class="count-fourty">
                        <div class="side-fourty pull-left text-center">
                            @foreach ($Modern as $row)

                                <span @if($row->id == 1) class="active"
                                      @endif data-num="m{{ $row->id }}">{{ $row->id }}</span>
                            @endforeach
                        </div>

                        @foreach ($Modern as $row)

                            <div class="post-fourty one-fourty pull-left @if($row->id == 1) active @endif "
                                 id="m{{ $row->id }}">
                                <div class="info-fourty pull-left">
                                    <h3 class="text-center">{{ $row->title }}</h3>
                                    <p class="p-r">{{ $row->post }}</p>
                                </div>
                                <div class=" pull-left">
                                    <img class="photo" src="{{asset("uploads/$row->img")}}" alt="">

                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="view-fourty text-center">
                        <span><a href="{{url('/modern')}}">More</a></span>
                    </div>
                </div>
            </div>


            <div class="fifth">
                <div class="container">
                    <div class="labell-fifth text-center">
                        <span class="text-capitalize">Coptic</span>
                    </div>
                    <div class="count-fifth">
                        <div class="side-fifth pull-right text-center">
                            @foreach ($Coptic as $row)

                                <span @if($row->id == 1) class="active"
                                      @endif data-num="c{{ $row->id }}">{{ $row->id }}</span>
                            @endforeach
                        </div>
                        @foreach ($Islamic as $row)

                            <div class="post-fifth one-fifth pull-right @if($row->id == 1) active @endif "
                                 id="c{{ $row->id }}">
                                <div class="info-fifth pull-left">
                                    <h3 class="text-center">{{ $row->title }}</h3>
                                    <p class="p-r">{{ $row->post }} </p>
                                </div>
                                <div class=" pull-left">
                                    <img class="photo" src="{{asset("uploads/$row->img")}}" alt="">

                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="view-fifth text-center">
                        <span><a href="{{url('/coptic')}}">More</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
