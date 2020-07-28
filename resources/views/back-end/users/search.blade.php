@foreach($rows as $row)


    <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->email}}</td>
        <td><img src="{{asset('UsersImage/'.$row->image)}}" class="img-circle" width="70" height="70" alt="User Image"></td>
        <td>{{$row->gender}}</td>
        <td>{{$row->group}}</td>

        <td><a href="{{route(''.$routeName.'.edit' , $row->id)}}">
                <button type="submit" value="Delete This" class="btn btn-warning">Edit</button>
            </a></td>
        <td>
            <form action="{{route(''.$routeName.'.destroy',$row->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" value="Delete This" class="btn btn-danger">DELETE</button>
            </form>
        </td>
    </tr>

@endforeach
