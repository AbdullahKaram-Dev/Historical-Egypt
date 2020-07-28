@extends('back-end.layout.layout')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->

                <div class="tab-content">
                    <div class="tab-pane active" id="comments-login">
                        <ul class="media-list">

                            <div class="row">

                            @foreach($comments as $comment)

                            <div class="col-lg-4">
                                        <li class="media" id="comment{{$comment->id}}">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle"
                                                     src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg"
                                                     alt="profile">
                                            </a>


                                            <div class="media-body">
                                                <div class="well well-lg">
                                                    <h4 class="media-heading text-uppercase reviews">{{$comment->user_name}}</h4>
                                                    <ul class="media-date text-uppercase reviews list-inline">
                                                        <li class="dd">{{ $comment->created_at->diffForHumans() }}</li>

                                                    </ul>
                                                    <p class="media-comment">{{$comment->comment}}</p>

                                                    @php
                                                        $replies = App\Models\Islamic_reply::where('comment_id',$comment->id)->get();
                                                    @endphp

                                                    <a class="btn btn-warning btn-circle text-uppercase"
                                                       data-toggle="collapse"
                                                       href="#replyThree{{$comment->id}}"style="width: 54%;"><span
                                                                class="glyphicon glyphicon-comment"></span>{{$replies->count()}}
                                                        comments</a>

                                                    <div class="btn  btn-circle text-uppercase">

                                                        <form action="{{route('delete.comment.islamic' , ['id' =>$comment->id])}}" method="post" >
                                                            <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                             <button type="submit" value="Delete This" class="btn btn-danger">DELETE</button>
                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="collapse" id="replyThree{{$comment->id}}">
                                                <ul class="media-list">
                                                    @foreach($replies as $reply)
                                                        <li class="media media-replied pull-right"
                                                            style="width: 80%">
                                                            <a class="pull-left" href="#">
                                                                <img class="media-object img-circle"
                                                                     src="https://s3.amazonaws.com/uifaces/faces/twitter/ManikRathee/128.jpg"
                                                                     alt="profile">
                                                            </a>
                                                                   <div class="media-body">
                                                                <div class="well well-lg">
                                                                    <h4 class="media-heading text-uppercase reviews">
                                                                        <span class="glyphicon glyphicon-share-alt"></span>
                                                                        The Hipster</h4>
                                                                    <ul class="media-date text-uppercase reviews list-inline">
                                                                        <li class="dd">{{$reply->created_at->diffForHumans()}}</li>
                                                                    

                                                                    </ul>
                                                                    <p class="media-comment">
                                                                        {{$reply->reply}}
                                                                    </p>
                                                                    <div class="btn  btn-circle text-uppercase">

                                                                        <form action="{{route('delete.replay.islamic' , ['id' =>$reply->id])}}" method="post" >
                                                                            <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                                                            <input type="hidden" name="_method" value="DELETE">
                                                                            <button type="submit" value="Delete This" class="btn btn-danger">DELETE</button>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>





                                        </li>
                                    </div>

                            @endforeach
                    </div>

                        </ul>
                    </div>
                </div>


                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
