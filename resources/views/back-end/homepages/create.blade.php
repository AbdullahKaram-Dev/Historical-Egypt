@extends('back-end.layout.layout')

@section('content')
        <div class="box-body">

            <form  action="{{route(''.$routeName.'.store')}}" method="post">
                @csrf
                <!-- text input -->
                <div class="form-group">
                    <label>Title</label>
                    <input type="text"  name="title" class="form-control" placeholder="Title" >
                </div>
                <!-- /. tools -->
                <div class="form-group">
                    <textarea id="editor1" class="form-control"  name="content" rows="10" cols="250"  placeholder="Enter Your content" ></textarea>
                </div>
               
                <button type="submit" name="save" class="btn btn-warning">Share HomePage</button>

            </form>
        </div>
        @endsection
