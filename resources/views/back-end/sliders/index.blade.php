@extends('back-end.layout.layout')

@section('search')

    <form class="sidebar-form">

        <div class="input-group">
            <input type="text" name="q" id="search-modern" class="form-control" placeholder="Search by Title...">
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
                            <h3 class="box-title">All {{$title}} </h3>
                            <div style="text-align: right">
                                <a href="{{route(''.$routeName.'.create')}}"><button type="button" class="btn btn-block btn-warning btn-lg">Add {{$title}}</button></a>
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
                                    <th>Content</th>
                                    <th>img</th>
                                    <th>status</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{!!$row->content!!}</td>
                                        <td><img src="{{asset('Sliders/'.$row->img)}}" class="img-circle" width="70" height="70" alt="User Image"></td>
                                        <td>{{$row->status}}</td>
                                        <td> <a href="{{route(''.$routeName.'.edit' , $row->id)}}"> <button type="submit" value="Delete This" class="btn btn-warning">Edit</button></a></td>

                                        <form action="{{route(''.$routeName.'.destroy',$row->id)}}" method="post" >
                                           <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                            <input type="hidden" name="_method" value="DELETE" >
                                            <td>  <button type="submit" value="Delete This" class="btn btn-danger">DELETE</button></td>
                                        </form>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>img</th>
                                    <th>status</th>
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
