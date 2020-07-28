@extends('back-end.layout.layout')

@section('content')
        <div class="box-body">

            <form  action="{{route(''.$routeName.'.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- text input -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text"  name="name" class="form-control" value="{{old('name')}}" placeholder="Enter The Name" >
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email"  name="email" class="form-control" value="{{old('email')}}" placeholder="Enter The Email" >
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password"  name="password" class="form-control"  placeholder="Enter The password" >
                </div>
                <div class="form-group">
                    <label>Group</label>
                    <select name="group"class="form-control" >

                        <option value="owner"> Owner </option>
                        <option value="admin"> Admin </option>
                        <option value="user"> User </option>

                    </select>
                </div>
                <div class="form-group"  style="color: #d58512">
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="optionsRadios1" value="male" checked="">
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="optionsRadios2" value="female">
                            Female
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" class="form-control-file" name="image"  value="{{old('image')}}" id="exampleInputFile">

                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <button type="submit" name="save" class="btn btn-warning">Add User</button>
            </form>
        </div>
        @endsection
