@foreach($rows as $row)
    <article class="artical"><!--artical one-->
        <img src="{{asset('uploads/'.$row->img.'')}}" alt="Civilizations of all time">
        <h5 class="text-capitalize text-center"><a href="{{url('/'.$title.'/post/'.$id = $row->id.'')}}" target="_self">{{$row->title}}</a></h5>
    </article><!--artical one-->

@endforeach
