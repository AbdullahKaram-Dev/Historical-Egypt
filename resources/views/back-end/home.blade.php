@extends('back-end.layout.layout')

@section('content')


    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$phoroanic}}</h3>

                    <p>Phoraonic</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-list"></i>
                </div>
                <a href="{{route('pharaonics.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$islamic}}<sup style="font-size: 20px"></sup></h3>

                    <p>Islamic</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-list"></i>
                </div>
                <a href="{{route('islamics.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$coptic}}</h3>

                    <p>Coptic</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-list"></i>
                </div>
                <a href="{{route('coptics.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$modern}}</h3>

                    <p>Modern</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-list"></i>
                </div>
                <a href="{{route('moderns.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-android-chat"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pharaonic Comments</span>
                    <span class="info-box-number">{{$PharaonicComments}}<small>Comments</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-android-chat"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Islamic Comments</span>
                    <span class="info-box-number">{{$islamicComments}}<small>Comments</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-android-chat"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Coptic Comments</span>
                    <span class="info-box-number">{{$copticComments}}<small>Comments</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-android-chat"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Modern Comments</span>
                    <span class="info-box-number">{{$modernComments}}<small>Comments</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <!-- /.col -->
    </div>
@endsection
