@extends('back-end.layout.layout')

@section('content')



    <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                    {{$messages->created_at->diffForHumans()}}
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">


                        <h3 class="timeline-header"> {{$messages->name}}</h3>

                        <div class="timeline-body">
                          {{$messages->message}}
                        </div>
                        <div class="timeline-footer">
                        </div>
                    </div>
            </ul>
        </div>
        <!-- /.col -->
    </div>

@endsection
