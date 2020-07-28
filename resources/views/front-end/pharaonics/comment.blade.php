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
                        src="{{ asset("UsersImage/".$User->image)}}"
                        alt="profile" width="100">
                    </a>


                    <div class="media-body">
                        <div class="well well-lg">
                            <h3 class="media-heading text-uppercase reviews">{{$User->name}}</h3>
                            <ul class="media-date text-uppercase reviews list-inline">
                                <li class="dd">{{ $comment->created_at->diffForHumans() }}</li>

                            </ul>
                            <p class="media-comment">
                                {{$comment->comment}}                                            </p>

                            @php
                                $replies = App\Models\Pharaonic_reply::where('comment_id',$comment->id)->get();
                            @endphp
                            <a class="btn btn-info btn-circle text-uppercase"
                               href="#reply{{$comment->id}}" data-toggle="collapse"><span
                                        class="glyphicon glyphicon-share-alt"></span> Reply</a>
                            <a class="btn btn-warning btn-circle text-uppercase"
                               data-toggle="collapse"
                               href="#replyThree{{$comment->id}}" style="color: black"><span
                                        class="glyphicon glyphicon-comment"></span>{{$replies->count()}}
                                comments</a>
                            @if(auth()->check())

                            @if(auth()->user()->id == $comment->user_id)

                                <div class=" btn-circle text-uppercase" style="float: right">

                                    <form >
                                        <meta name="csrf-token-r" content="{{ csrf_token() }}">


                                        <meta id="comment_id" comment_id="{{$comment->id}}">

                                        <meta id="post_id" post_id="{{$rows->id }}">
                                      <button type="submit"  class="btn btn-danger deletePharaonic">DELETE
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

                                                <div class=" btn-circle text-uppercase" style="float: right">

                                                    <form >
                                                        <meta name="csrf-token-r" content="{{ csrf_token() }}">

                                                        <button type="submit" reply_id="{{$reply->id}}"
                                                            comment_id="{{$comment->id }}"
                                                        class="btn btn-danger deletePharaonicReply">
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
                                <form >

                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                    <meta id="post_id" post_id="{{ $rows->id }}" >



                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Comment</label>
                                        <div class="col-sm-10">
                                            <textarea  class="form-control reply" required name="comment"
                                                        text="{{ $comment->id }}" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        <button comment_id="{{ $comment->id }}" class="btn btn-warning btn-circle text-uppercase ReplyPharaonic"
                                                    type="submit" >Summit comment
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
            @endforeach

        </ul>
    </div>
    <div class="tab-pane" id="add-comment-disabled">

        @if(Auth::check())

        <form >

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
                   <button class="btn btn-warning btn-circle text-uppercase CommentPharaonic"type="submit" >
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
<script src="{{asset('front/js/pharaonic.js')}}"></script>

