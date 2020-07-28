@extends('back-end.layout.layout')

@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All {{$title}}</h3>
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
                                    <th >Content</th>
                                   
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                @foreach($rows as $row)
                                 <tbody>

                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->title}}</td>
                                        <td >{!!$row->content!!}</td>

                                        <td> <a href="{{route(''.$routeName.'.edit' , $row->id)}}"> <button type="submit" value="Delete This" class="btn btn-warning">Edit</button></a></td>

                                        <form action="{{route(''.$routeName.'.destroy',$row->id)}}" method="post" >
                                           <input type="hidden" name="_token"  value="{{csrf_token()}}">
                                            <input type="hidden" name="_method" value="DELETE" >
                                            <td>  <button type="submit" value="Delete This" class="btn btn-danger">DELETE</button></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                @endforeach
                             
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
