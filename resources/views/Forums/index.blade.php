@extends('layouts.website')
@section('content')
<div class="body">
    <ol class="breadcrumb col-md-12">
        <div class="container">
            <li class="breadcrumb-item">
                <a class="text-secondary" href="/">Home</a>
                <span class="text-muted">/ {!! $title !!}</span>
            </li>
        </div>
    </ol>
</div>
<section>
    @if(count($projects) <= 0)
        <div class="text-center container animated fadeInLeft">
            <div class="row justify-text-center">
                <div class="col-md-12">
                    <div class="card">
                            <div class="card-body">
                                <i class="fa fa-fw fa-warning" style="font-size:80px"></i>
                                <h2 class="text-center text-muted" style="margin-top:15px;">No Projects Posted!</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    @else
        <div class="row">
            @include('Forums.calc')
            <div class="container">@include('website.partials.page_header')</div>
            <div class="container">
                <div class="row">
                    <div class="side col-lg-4">
                        <div class="card1">
                            <div class="card-header bg-custom text-light">
                                <h4 class="header">Projects with it's Trainings</h4>
                            </div>
                            <div class="card-body">
                                @foreach($projects as $item)
                                    <ul>
                                       <li>
                                            @if($item->otp_status == 'ongoing')
                                                <a href="/projects/trainings/{{$item->id}}">{{$item->project_name}}</a> <span class="text-success"> (On-going)</span>
                                            @elseif($item->otp_status == 'finished')
                                                <a href="/projects/trainings/{{$item->id}}">{{$item->project_name}}</a> <span class="text-info"> (Done)</span>
                                            @elseif($item->otp_status == 'extended')
                                                <a href="/projects/trainings/{{$item->id}}">{{$item->project_name}}</a> <span class="text-warning"> (Extended)</span>
                                            @else
                                                <a href="/projects/trainings/{{$item->id}}">{{$item->project_name}}</a>
                                            @endif
                                            <ul>
                                                @foreach(\App\Trainings::all() as $train)
                                                    @if($train->proj_id == $item->id)
                                                        @if(\App\Trainings::where('proj_id','=',$item->id)->count() < 0)
                                                            <li>No Trainings</li>
                                                        @else
                                                            <li>{{$train->training_name}}</li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li> 
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach($projects as $proj)
                                <div class="col-md-6">
                                    <div class="card1" style="min-height:330px;max-height:330px;background-image:url('/storage/profile_images/banner/about.png');">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h5><img class="img img-circle" src="/images/cmu.png" style="width:30px;height:30px">&nbsp;|&nbsp;{{$proj->project_name}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <a href="#">
                                                <img style="margin-left:-21px;margin-top:-20px" src="/storage/project_image/{{$proj->project_image}}" width="350px" height="125px">
                                            </a><p></p>
                                            <h6>{{\Illuminate\Support\Str::words($proj->description,8)}} <a href="/projects/trainings/{{$proj->id}}">View More</a></h6>
                                        </div>
                                        @foreach($objectives as $object)
                                            @if($object->proj_id ==  $proj->id)
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" aria-valuemax="100" style="width:{{ days($proj->date_conducted, $proj->to_date) + $object->total }}%"><small>{{ days($proj->date_conducted, $proj->to_date) + $object->total }}%</small></div>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="card-footer text-right">
                                            <div class="row">
                                                <div class="col-sm-12 pull-right"><small><strong>{{ datec($proj->date_conducted, $proj->to_date) }}</strong></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container text-right pagination-sm">{{$projects->links()}}</div>
</section>
@endsection