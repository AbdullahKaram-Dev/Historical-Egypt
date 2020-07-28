@extends('back-end.layout.layout')

@section('content')
        <div class="box-body">

            <form  action="{{route(''.$routeName.'.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- text input -->
                <div class="form-group">
                    <label>Title</label>
                    <input type="text"  name="title" class="form-control" value="{{old('title')}}" placeholder="Title" >
                </div>
                <!-- /. tools -->
                <div class="form-group">
                    <textarea id="editor1" class="form-control"  name="post" rows="10" cols="250"  placeholder="Enter Your Post" >{{old('post')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" class="form-control-file" name="img"  value="{{old('img')}}" id="exampleInputFile">

                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <button type="submit" name="save" class="btn btn-warning">Share Post</button>

            </form>
        </div>
        @endsection
