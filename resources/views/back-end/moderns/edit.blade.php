@extends('back-end.layout.layout')

@section('content')

        <div class="box-body">

            <form  action="{{route(''.$routeName.'.update' , ['id' => $row])}}" method="post" enctype="multipart/form-data">
                {{method_field('put')}}
                    @csrf

                <!-- text input -->
                <div class="form-group">
                    <label>Title</label>
                    <input type="text"  name="title" class="form-control" value="{{$row->title}}" placeholder="Write New Title Here" >
                </div>
                <!-- /. tools -->
                <div class="form-group">
                    <textarea id="editor1" class="form-control"  name="post" rows="10" cols="250" placeholder="Write New Post Here" >{{$row->post}}</textarea>
                </div>
                <div>
                    <img src="{{asset('uploads/'.$row->img)}}" width="400px" height="200px" ><br>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input name="img" class="form-control-file" type="file" id="exampleInputFile">

                </div>
                <button type="submit" name="save" class="btn btn-warning">Edit Post</button>

            </form>
        </div>
        @endsection
