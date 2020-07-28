@extends('back-end.layout.layout')

@section('content')

        <div class="box-body">

            <form  action="{{route(''.$routeName.'.update' , ['id' => $row])}}" method="post" enctype="multipart/form-data">
                {{method_field('put')}}
                    @csrf
                {{--<input type="hidden" name="_token" value="{{csrf_token()}}" >--}}
                {{--<input type="hidden" name="_method" value="POST" >--}}

                <!-- text input -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text"  name="name" class="form-control" value="{{$row->name}}" placeholder="Write New Title Here" >
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email"  name="email" class="form-control" value="{{$row->email}}" placeholder="Write New Title Here" >
                </div>

                <div class="form-group">
                    <label>Group</label>
                 <select name="group"class="form-control" >

                     <option value="owner" {{isset($row) && $row->group == 'owner' ? 'selected' : '' }}> Owner </option>
                     <option value="admin" {{isset($row) && $row->group == 'admin' ? 'selected' : '' }}> Admin </option>
                     <option value="user" {{isset($row) && $row->group == 'user' ? 'selected' : '' }}> User </option>

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

                <!-- /. tools -->
                <div>
                    <img src="{{asset('UsersImage/'.$row->image)}}" width="400px" height="200px" ><br>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input name="img" class="form-control-file" type="file" id="exampleInputFile">

                </div>

                <button type="submit" name="save" class="btn btn-warning">Edit User</button>

            </form>
        </div>
        @endsection
