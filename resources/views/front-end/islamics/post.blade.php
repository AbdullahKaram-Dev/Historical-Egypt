@extends('front-end.layout.app')

@section('content')
    <div class="full-post"><!--start full-post-->
        <div class="upper-all"><!--strat upper-all-->
            <h2 class="h2-custom text-center">{{$rows->title}}</h2>

            <div class="container"><!--container-->
                <div class="post-book"><!--post-book-->
                    <div class="cover"><!--cover-->
                        <div class="img"
                             style=" background: url('{{ asset("uploads/$rows->img") }}') no-repeat center ;background-size: cover; ">
                            <div class="many-cover">
                                <div class="one">

                                    <h3 class="pull-right">{{$rows->title}}</h3>
                                    <button class="btn pull-left" id="open">open</button>
                                </div>
                            </div>
                        </div>

                        <div class="backface">

                            <div class="photo"
                                 style=" background: url('{{ asset("uploads/$rows->img") }}') no-repeat center ;background-size: cover; ">
                                <div class="control">
                                    <h3 class="pull-left">{{$rows->title}}</h3>
                                    <button class="btn pull-right" id="close">close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page"><!--page-->
                        <p class="p-r"> {{$rows->post}}</p>
                    </div>
                </div>
            </div>

            <!--container-->
            <div class="row">
                <div class="col-md-12 bar-like ">
                    @php
                        $like = 0;
                        $dislike = 0;
                        $stylelike = 'btn-default';
                        $styledislike = 'btn-default';
                        foreach ($rows->likes as $li){
                        if ($li->like == 1){
                            $like ++;
                        }elseif($li->like == 0){
                            $dislike ++;
                        };
                            if(auth()->check()){

                           if ( $li->like == 1 && $li->user_id == auth()->user()->id  )
                              $stylelike = 'btn-danger';

                            if ( $li->like == 0 && $li->user_id == auth()->user()->id  )
                            $styledislike = 'btn-danger ';

                        }
                    }
                    @endphp

                    <a class="likeee  btn {{$stylelike}} tip"
                       data-post_id="{{$rows->id}}_l"
                       data-like="{{$stylelike}}"
                       style=" margin-right: 10px;">
                        <span class="fa fa-thumbs-up"></span>
                        <span class="like_count">{{$like}}</span></a>

                    <a class="dislikee  btn {{$styledislike}} tip  "
                       data-post_id="{{$rows->id}}_d"
                       data-like="{{$styledislike}}"
                       style="margin-right: 10px;">
                        <span class="fa fa-thumbs-down"></span>
                        <span class="dislike_count">{{$dislike}}</span></a>

                    @php
                        $comment = App\Models\IslamicComment::where('post_id' , $rows->id)->get();
                    @endphp
                    <a id="dislike" href="#comments-login" class="btn btn-default tip" style="margin-right: 10px;"><span
                                class="fa fa-comment"></span> {{ $comment->count() }} Comment</a>

                    <a href="#" class="btn btn-default disabled"><i
                                class="fa fa-eye"></i>{{' '. $rows->viewers .' Views'}}</a>


                </div>
            </div>

            <div class="container">

                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1" style=" margin-top: 100px; ">
                        <div class="page-header">
                            <h3 class="reviews">Leave your comment</h3>

                        </div>
                        <div class="comment-tabs bt">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#comments-login" role="tab" data-toggle="tab"><h4
                                                class="reviews text-capitalize">Comments</h4></a></li>
                                <li><a href="#add-comment-disabled" role="tab" data-toggle="tab"><h4
                                                class="reviews text-capitalize">Add comment</h4></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="comments-login">
                                    <ul class="media-list ">
                                        @php
                                            $AllComments =$rows->comments
                                        @endphp
                                        @foreach($AllComments->reverse() as $comment)

                                            @php
                                                $UserData = \App\User::where('id',$comment->user_id)->get();
                                            @endphp
                                            @foreach($UserData as $User)

                                                <li class="media" id="comment{{$comment->id}}">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object img-circle"
                                                             src="{{asset("UsersImage/".$User->image)}}"
                                                             alt="profile" width="100">
                                                    </a>


                                                    <div class="media-body">
                                                        <div class="well well-lg">
                                                            <h3 class="media-heading text-uppercase reviews">{{$User->name}}</h3>
                                                            <ul class="media-date text-uppercase reviews list-inline">
                                                                <li class="dd">{{ $comment->created_at->diffForHumans() }}</li>

                                                            </ul>
                                                            <p class="media-comment">{{$comment->comment}}</p>
                                                            @endforeach
                                                            @php
                                                                $replies = App\Models\Islamic_reply::where('comment_id',$comment->id)->get();
                                                            @endphp
                                                            <a class="btn btn-info btn-circle text-uppercase"
                                                               href="#reply{{$comment->id}}"
                                                               data-toggle="collapse"><span
                                                                        class="glyphicon glyphicon-share-alt"></span>
                                                                Reply</a>
                                                            <a class="btn btn-warning btn-circle text-uppercase"
                                                               data-toggle="collapse"
                                                               href="#replyThree{{$comment->id}}"
                                                               style="color: black"><span
                                                                        class="glyphicon glyphicon-comment"></span>{{$replies->count()}}
                                                                comments</a>
                                                            @if(auth()->check())

                                                                @if(auth()->user()->id == $comment->user_id)

                                                                    <div class=" btn-circle text-uppercase"
                                                                         style="float: right">

                                                                        <form>
                                                                            <meta name="csrf-token-r"
                                                                                  content="{{ csrf_token() }}">


                                                                            <meta id="comment_id"
                                                                                  comment_id="{{$comment->id}}">

                                                                            <meta id="post_id" post_id="{{$rows->id }}">
                                                                            <button type="submit"
                                                                                    class="btn btn-danger deleteIslamic">
                                                                                DELETE
                                                                            </button>
                                                                        </form>

                                                                    </div>
                                                                @endif
                                                            @endif

                                                        </div>
                                                    </div>

                                                    <div class="collapse" id="replyThree{{$comment->id}}">
                                                        <ul class="media-list rep">


                                                            @foreach($replies->reverse() as $reply)
                                                                @php
                                                                    $UserData = \App\User::where('id',$reply->user_id)->get();

                                                                @endphp
                                                                @foreach($UserData as $User)

                                                                    <li class="media media-replied pull-right"
                                                                        style="width: 80%">
                                                                        <a class="pull-left" href="#">
                                                                            <img class="media-object img-circle"
                                                                                 src="{{asset("UsersImage/".$User->image)}}"
                                                                                 alt="profile" width="100">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <div class="well well-lg">
                                                                                <h3 class="media-heading text-uppercase reviews">
                                                                                    <span class="glyphicon glyphicon-share-alt"></span>
                                                                                    {{$User->name}}</h3>
                                                                                <ul class="media-date text-uppercase reviews list-inline">
                                                                                    <li class="dd">{{$reply->created_at->diffForHumans()}}</li>

                                                                                </ul>
                                                                                <p class="media-comment">
                                                                                    {{$reply->reply}}
                                                                                </p>
                                                                                @if(auth()->check())

                                                                                    @if(auth()->user()->id == $reply->user_id)

                                                                                        <div class=" btn-circle text-uppercase"
                                                                                             style="float: right">

                                                                                            <form>
                                                                                                <meta name="csrf-token-r"
                                                                                                      content="{{ csrf_token() }}">

                                                                                                <button type="submit"
                                                                                                        reply_id="{{$reply->id}}"
                                                                                                        comment_id="{{$comment->id }}"
                                                                                                        class="btn btn-danger deleteIslamicReply">
                                                                                                    DELETE
                                                                                                </button>
                                                                                            </form>

                                                                                        </div>
                                                                                        <div style="clear: both"></div>
                                                                                    @endif
                                                                                @endif

                                                                            </div>

                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                    {{--start send reply--}}
                                                    <div class=" clearfix"></div>

                                                    <div class="collapse" id="reply{{$comment->id}}">
                                                        @if(Auth::check())

                                                            <ul class="media-list">
                                                                <form>

                                                                    <meta name="csrf-token"
                                                                          content="{{ csrf_token() }}">

                                                                    <meta id="post_id" post_id="{{ $rows->id }}">


                                                                    <div class="form-group">
                                                                        <label for="email"
                                                                               class="col-sm-2 control-label">Comment</label>
                                                                        <div class="col-sm-10">
                                                                        <textarea class="form-control reply" required
                                                                                  name="comment"
                                                                                  text="{{ $comment->id }}"
                                                                                  rows="5"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="col-sm-offset-2 col-sm-10">
                                                                            <button comment_id="{{ $comment->id }}"
                                                                                    class="btn btn-warning btn-circle text-uppercase ReplyIslamic"
                                                                                    type="submit">Summit comment
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </ul>
                                                        @else
                                                            <div class="alert alert-info alert-dismissible"
                                                                 role="alert">
                                                                <button type="button" class="close"
                                                                        data-dismiss="alert">
                                                                    <span aria-hidden="true">×</span><span
                                                                            class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Hey!</strong> If you already have an account <a
                                                                        href="{{route('login')}}" class="alert-link">Login</a>
                                                                now to make the comments you want. If you do not have an
                                                                account yet you're welcome to <a href="#"
                                                                                                 class="alert-link">
                                                                    create an account.</a>
                                                            </div>

                                                        @endif
                                                    </div>

                                                    {{--end send reply--}}

                                                </li>
                                            @endforeach

                                    </ul>
                                </div>
                                <div class="tab-pane" id="add-comment-disabled">

                                    @if(Auth::check())

                                        <form>

                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <meta id="post_id" post_id="{{ $rows->id }}">
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Comment</label>
                                                <div class="col-sm-10">
                                                <textarea class="form-control" required name="comment"
                                                          id="comment" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button class="btn btn-warning btn-circle text-uppercase CommentIsalmic"
                                                            type="submit">
                                                        <span class="glyphicon glyphicon-send"></span> Summit comment
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    @else
                                        <div class="alert alert-info alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">
                                                <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                            </button>
                                            <strong>Hey!</strong> If you already have an account <a
                                                    href="{{route('login')}}" class="alert-link">Login</a> now to make
                                            the comments you want. If you do not have an account yet you're welcome to
                                            <a href="#" class="alert-link"> create an account.</a>
                                        </div>

                                    @endif


                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-header text-center">
                </div>
            </div>

            <h2 class="h2-custom text-center text-capitalize">Customer opinion</h2>
            <div class="some-comment text-center"><!-- start some-comment -->
                <div id="some-comment" class="carousel slide" data-ride="carousel">  <!-- slider -->
                    <div class="container">  <!-- container -->

                        <ol class="carousel-indicators">      <!-- start polites -->
                            <li data-target="#some-comment" data-slide-to="0" class="active">
                                <img src="{{asset('front/photo/kisspng-hairstyle-fashion-layered-hair-male-5afe715a21d3b0.2683537715266246021386.png')}}"
                                     alt="name">
                            </li>
                            <li data-target="#some-comment" data-slide-to="1">
                                <img src="{{asset('front/photo/face_PNG11752.png')}}" alt="name">
                            </li>
                            <li data-target="#some-comment" data-slide-to="2">
                                <img src="{{asset('front/photo/face_PNG11761.png')}}" alt="name">
                            </li>
                        </ol>

                        <!-- end polites -->

                        <div class="carousel-inner" role="listbox">     <!-- start image for slider -->
                            <div class="item active">       <!-- S 1 img -->
                                <h3 class="text-capitalize">jack tony</h3>
                                <p class="p-r text-capitalize">i can create responsive websites with all kinds of
                                    screens(Mobile - tablet - computer).And create more than one design for each media.
                                    To be the best of its class. and Ensure that design elements do not overlap.
                                    lore</p>
                            </div>      <!-- E 1 img -->

                            <div class="item">      <!-- S 2 img -->
                                <h3 class="text-capitalize">jomana rose</h3>
                                <p class="p-r text-capitalize">Before the start of the work will be planned for the site
                                    first. To be a customer has a clear vision to the end. Also the design will be
                                    creative with the use of appropriate colors and unique scenarios.</p>
                            </div>      <!-- E 2 img -->

                            <div class="item">      <!-- S 3 img -->
                                <h3 class="text-capitalize">dani vazquez</h3>
                                <p class="p-r text-capitalize">Will to be to Your Design Has More Than One Theme With
                                    Different Colors To Change As You Like From Within The Site. With Wonderful Effects
                                    And Temporary Moves To Get The Best Design With The Highest Quality And Best Shape
                                </p>
                            </div>      <!-- E 3 img -->
                        </div>          <!-- end image for slider -->

                    </div>      <!-- container -->
                </div>      <!-- slider -->
            </div>      <!-- end some-comment -->

            <div class="Most-popular"><!--Most-popular-->
                <div class="container">
                    <div class="row">
                        <h2 class="h2-custom text-center">Most-popular</h2>
                        <div class="col-lg-3 col-sm-6 col-xs-12 ">
                            <div class="most"><!--most 1-->
                                <img src="{{asset('front/photo/images (8).jpg')}}" alt="" class="img-responsive">
                                <div class="over-lay">
                                    <h6 class="text-center"><a href="#">lorem</a></h6>
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptas, sequi. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Minima ratione deleniti</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-xs-12 ">
                            <div class="most"><!--most 2-->
                                <img src="{{asset('front/photo/000.jpg')}}">
                                <div class="over-lay">
                                    <h6 class="text-center"><a href="#">lorem</a></h6>
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptas, sequi. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Minima ratione deleniti</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-xs-12 ">
                            <div class="most"><!--most 3-->
                                <img src="{{asset('front/photo/news_1567257518_8303.jpg')}}">
                                <div class="over-lay">
                                    <h6 class="text-center"><a href="#">lorem</a></h6>
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptas, sequi. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Minima ratione deleniti</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-xs-12 ">
                            <div class="most"><!--most 4-->
                                <img src="{{asset('front/photo/لوحات-وتحف-متحف-اللوفر.jpg')}}">
                                <div class="over-lay">
                                    <h6 class="text-center"><a href="#">lorem</a></h6>
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptas, sequi. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Minima ratione deleniti</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-xs-12 ">
                            <div class="most"><!--most 5-->
                                <img src="{{asset('front/photo/images.png')}}">
                                <div class="over-lay">
                                    <h6 class="text-center"><a href="#">lorem</a></h6>
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptas, sequi. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Minima ratione deleniti</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-xs-12 ">
                            <div class="most"><!--most 6-->
                                <img src="{{asset('front/photo/4444444444444444444444444444444444.jpg')}}">
                                <div class="over-lay">
                                    <h6 class="text-center"><a href="#">lorem</a></h6>
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptas, sequi. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Minima ratione deleniti</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-xs-12 ">
                            <div class="most"><!--most 7-->
                                <img src="{{asset('front/photo/13284541691413704985-resized_IMG_0631.jpg')}}">
                                <div class="over-lay">
                                    <h6 class="text-center"><a href="#">lorem</a></h6>
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptas, sequi. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Minima ratione deleniti</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-xs-12 ">
                            <div class="most"><!--most 8-->
                                <img src="{{asset('front/photo/0126224alsh3er.jpg')}}">
                                <div class="over-lay">
                                    <h6 class="text-center"><a href="#">lorem</a></h6>
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptas, sequi. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Minima ratione deleniti</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Most-popular-->

        </div><!--end upper-all-->
    </div><!--end full-post-->
@endsection
