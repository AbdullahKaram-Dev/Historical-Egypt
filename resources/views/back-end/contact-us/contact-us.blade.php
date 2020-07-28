@extends('back-end.layout.layout')

@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Messages </h3>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            @foreach($rows as $row)
                                <tbody>

                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->phone}}</td>


                                    <td><a href="{{route('MessageContactUs' , $id = $row->id)}}">
                                            <button type="submit" value="Delete This" class="btn btn-warning">Show
                                            </button>
                                        </a></td>

                                    <form action="{{route('MessageDelete' , $id = $row->id)}}" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <td>
                                            <button type="submit" value="Delete This" class="btn btn-danger">DELETE
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                </tbody>
                            @endforeach
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Edit</th>
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
