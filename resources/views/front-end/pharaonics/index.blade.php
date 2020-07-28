@extends('front-end.layout.app')
@section('content')
    <div class="pharaonic">
        <div class="container all">
            <h2 class="h2-custom text-center">{{$title}}</h2>


            <div class="row">
                <div class="text-center">
                    <form class="form-inline ml-auto">
                        <div class="md-form my-0">
                            <input class="form-control mr-sm-2" id="search-pharaonic" type="text"
                                   placeholder="Search by Title..." aria-label="Search">
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <section class="grid text-center rowspharaonic"  id="grid"  style="color: #ff5959">
                @foreach($rows as $row)
                    <article class="artical"><!--artical one-->
                        <a href="{{url('/'.$title.'/post/'.$id = $row->id.'')}}"><img src="{{asset('uploads/'.$row->img.'')}}" alt="Civilizations of all time"></a>
                        <h5 class="text-capitalize text-center"><a href="{{url('/'.$title.'/post/'.$id = $row->id.'')}}"
                                                                   target="_self">{{$row->title}}</a></h5>
                    </article>

                @endforeach

            </section>
            <span class="center-block text-center">
                {{$rows->links()}}
            </span>
        </div>


        <div class="Most-popular">
            <div class="container">
                <div class="row">
                    <h2 class="h2-custom text-center">Most-popular</h2>

                    @foreach($MostPopularPharaoh as $PopularPharaoh)
                    <div class="col-lg-3 col-sm-6 col-xs-12 ">
                        <div class="most">
                            <img src="{{asset('uploads/'.$PopularPharaoh->img)}}" alt="" class="img-responsive">
                            <div class="over-lay">
                                <a href="{{url('/'.$title.'/post/'.$id = $PopularPharaoh->id.'')}}"><h6 class="text-center">{{$PopularPharaoh->title}}</h6></a>
                                <a href="{{url('/'.$title.'/post/'.$id = $PopularPharaoh->id.'')}}"><p class="text-center">{{$PopularPharaoh->post}}</p></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


