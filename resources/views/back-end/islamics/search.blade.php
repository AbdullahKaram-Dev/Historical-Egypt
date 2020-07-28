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
        <td>
        <form action="{{route(''.$routeName.'.destroy' , $row->id)}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="DELETE">

                <button type="submit" value="Delete This" class="btn btn-danger">DELETE
                </button>

        </form>
        </td>
    </tr>
@endforeach
