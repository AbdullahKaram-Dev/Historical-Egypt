@extends('back-end.layout.layout')
@section('search')

    <form class="sidebar-form">

        <div class="input-group">
            <input type="text" name="q" id="search-islamic" class="form-control" placeholder="Search by Title...">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-flat search-ajax "><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>

@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All {{$title}} Posts</h3>
                        <div style="text-align: right">
                            <a href="{{route(''.$routeName.'.create')}}">
                                <button type="button" class="btn btn-block btn-warning btn-lg">Add Post</button>
                            </a>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>

                            <div. class="alert.alert-success">
                                @if(session()->has('message'))
                                    <h1>{{session()->get('message')}}</h1>
                                @endif
                            </div.>

                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Show</th>
                                <th>Comments</th>
                                <th>Viewers</th>
                                <th>Likes</th>
                                <th>DisLikes</th>
                                <th>Action</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody class="rowsislamic">
                            @foreach($rows as $row)
                                @php
                                    $post_id = $row->id;
                                        $likes = \App\Models\IslamicLike::where('post_id' ,$post_id  )
                                        ->where('like', 1)->count();
                                    $dislikes =\App\Models\IslamicLike::where('post_id' ,$post_id  )
                                        ->where('like' , 0)->count();
                                @endphp


                                <tr>
                                    <td>{{$row->id}}</td>

                                    <td>{{$row->title}}</td>

                                    <td><a href="{{route('singlepost.islamic', ['id' =>$row->id])}}">
                                            <button type="submit" class="btn btn-primary">Show</button>
                                        </a></td>
                                    
                                    <td><a href="{{route('islamic.comments', ['id' =>$row->id])}}">
                                            <button type="submit" class="btn btn-warning">Comments</button>
                                        </a></td>

                                    <td><span class="badge btn-warning">{{$row->viewers }}</span></td>


                                    <td><span class="badge btn-primary">{{$likes}}</span></td>
                                    <td><span class="badge btn-danger">{{$dislikes}}</span></td>

                                    <td><a href="{{route(''.$routeName.'.edit' , $row->id)}}">
                                            <button type="submit" value="Delete This" class="btn btn-warning">Edit
                                            </button>
                                        </a></td>

                                    <form action="{{route(''.$routeName.'.destroy',$row->id)}}" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <td>
                                            <button type="submit" value="Delete This" class="btn btn-danger">DELETE
                                            </button>
                                        </td>
                                    </form>
                                </tr>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Show</th>
                                <th>Comments</th>
                                <th>Viewers</th>
                                <th>Likes</th>
                                <th>DisLikes</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
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
