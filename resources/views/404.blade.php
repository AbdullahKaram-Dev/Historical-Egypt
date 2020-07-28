
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap4.min.css')}}">


</head>
<body style="margin: 0;">


<div class="error404">
    <img style="width: 100%;
    height: 100%;" src="{{asset('front/photo/404/404.png')}}" alt="">
    <div class="b-error">
        {{-- @php
            dd(redirect ()->back());
        @endphp --}}
    <a href="{{  url('/') }}" class="btn btn-primary a-error">Back</a>

    </div>
</div>

    
</body>
</html>