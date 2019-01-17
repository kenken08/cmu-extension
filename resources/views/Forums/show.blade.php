@extends('layouts.website')
@section('content')
<div class="body">
    <ol class="breadcrumb col-md-12">
        <div class="container">
            <li class="breadcrumb-item">
                <a class="text-secondary" href="/">Home</a>
                <a class="text-secondary" href="/projects">/ Projects</a>
                <span class="text-muted">/ {!! $title !!}</span>
            </li>
        </div>
    </ol>
</div>
<section>
    @if(count($trainings) <= 0)
        <div class="text-center container animated fadeInLeft">
            <div class="row justify-text-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-fw fa-warning" style="font-size:80px"></i>
                            <h2 class="text-center text-muted" style="margin-top:15px;">No Trainings under {{$project->project_name}}!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('Forums.calc')
        <section style="background:url('/storage/profile_images/banner/about.jpg/');background-repeat:no-repeat;height:300px;margin-top:-15px;">
            <div class="text-center" style="padding-top:5%">
                <div class="row features">
                    <div class="col-md-12">
                        <h2 class="text-center">
                            <span class="heading_border bg-gween">Welcome to {{$project->project_name}} Forum</span>
                        </h2>
                        <h3 class="text-center">
                            
                            @if($project->otp_status == 'ongoing')
                                <h3> Project Status: <span class="btn btn-sm btn-success"> On-going</span></h3>
                            @elseif($project->otp_status == 'finished')
                                <h3> Project Status: <span class="btn btn-sm btn-info"> Done</span></h3>
                            @elseif($project->otp_status == 'extended')
                                <h3> Project Status: <span class="btn btn-sm btn-warning"> Extended</span></h3>
                            @else
                                <h3> Project Status: <span class="btn btn-sm btn-default">---</span></h3>
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </section>
        @foreach($objectives as $object)
            @if($object->proj_id ==  $proj_id)
                <div class="progress">
                    <div aria-placeholder="Project's Progess" class="progress-bar progress-bar-striped progress-bar-animated" aria-valuemax="100" style="width:{{ days($project->date_conducted, $project->to_date) + $object->total }}%"><small>{{ days($project->date_conducted, $project->to_date) + $object->total }}% Project's Progress</small></div>
                </div>
            @endif
        @endforeach
        <section>
            <div class="form-control">
                <div class="container">
                    <button id="timeview" class="btn btn-labeled btn-warning btn-submit">
                        <span class="btn-label"><i class="fa fa-fw fa-film"></i></span>{{__('View Timeline')}}
                    </button>
                    <button id="trainview" class="btn btn-labeled btn-primary btn-submit">
                        <span class="btn-label"><i class="fa fa-fw fa-check"></i></span>{{__('View Trainings')}}
                    </button>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div id="trainingsview" class="row hidden">
                        <div class="container"> @include('website.partials.page_header')</div>
                        {!! Form::open(['action' => 'RequestTrainingsController@request', 'method'=>'POST']) !!}
                        {!! csrf_field() !!}
                            @if(Auth::check())
                                <div class="form-control">
                                    <button class="btn btn-labeled btn-primary btn-submit">
                                        <span class="btn-label"><i class="fa fa-fw fa-check"></i></span>{{__('Request Trainings')}}
                                    </button>
                                </div>
                            @else
                                <div class="form-control">
                                    <a href="/login" class="btn btn-sm btn-labeled btn-outline-success btn-submit">
                                        <span class="btn-label"><i class="fa fa-fw fa-sign-in"></i></span>{{__('Login')}}
                                    </a> to Request Trainings
                                </div>
                            @endif
                            <br>
                            <div class="col-md-12">
                                <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-fw fa-newspaper-o text-muted"></i> Training Name</th>
                                            <th class="text-center">Request Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trainings as $training)
                                            <tr>
                                                <td style="width:500px">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card animated fadeIn">
                                                                <div class="card-header">
                                                                    <h5 class="card-title"><i class="fa fa-fw fa-newspaper-o"></i>{{$training->training_name}}</h5>
                                                                    <small>From: {{date('M d, Y', strtotime($training->fdate_conducted) )}} To: {{date('M d, Y', strtotime($training->tdate_conducted) )}} at {{$training->venue}}</small>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </td>
                                                <td class="text-center" style="vertical-align:middle;">
                                                    <label class="c-css-toggle toggle-button">
                                                        <input type="checkbox" name="requests[]" value="{{$training->id}}"> 
                                                        <div class="c-css-toggle__button">
                                                            <div class="c-css-toggle__button__knob">
                                                            <div class="c-css-toggle__button__knob__off">&times;</div> 
                                                            <div class="c-css-toggle__button__knob__pommel"></div> 
                                                            <div class="c-css-toggle__button__knob__on">&check;</div>
                                                            </div>
                                                        </div> 
                                                    </label> 
                                                </td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div id="timeline" class="row">
                        <div class="col-md-12"><br><br>
                            <div class="page-header text-center">
                                <h1 id="timeline">Timeline</h1>
                            </div>
                            <ul class="timeline">
                                {{-- @foreach($objectives as $object)
                                    @if($object->proj_id ==  $proj_id)
                                        @if((days($project->date_conducted, $project->to_date) + $object->total)==100 && $project->to_date <= \Carbon\Carbon::today()) --}}
                                            <li class="timeline" style="margin-top:-40px">
                                                <div class="timeline-badge danger">
                                                    <small><i class="fa fa-flag-checkered"> END</i></small>
                                                </div>
                                            </li><br><br><br>
                                        {{-- @endif
                                    @endif
                                @endforeach --}}
                                @php($i=1)
                                @foreach($activities as $act)
                                    <li class="timeline{{($i%2)? '-inverted':''}}">
                                        <div class="timeline-badge" style="background:{{($act->date_of_activity <= \Carbon\Carbon::today())? '#'.dechex(rand(0x000000, 0xFFFFFF)) : 'grey'}}"><i class="fa {{$act->icon}}"></i></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <img src="/storage/cover_photo/{{$act->cover_photo}}" alt="" width="250px" height="100px">
                                                <p></p>
                                                <h4 class="timeline-title">{{$act->activity_title}} {!! (\Carbon\Carbon::today()==$act->date_of_activity)? '<span class="btn btn-sm btn-success">On-Going</span>': (\Carbon\Carbon::today() > $act->date_of_activity)? '<span class="btn btn-sm btn-info">Done</span>' : '' !!}</h4>
                                                <p><h6 class="text-muted"><i class="fa fa-time"></i> {{date('F d, Y', strtotime($act->date_of_activity))}}</h6></p>
                                            </div>
                                            <div class="timeline-body">
                                                <p>{!!$act->description!!}</p>
                                            </div>
                                        </div>
                                    </li>
                                @php($i++)
                                {{-- @php($j=1)
                                @foreach($trainings as $train)
                                    @if(\Carbon\Carbon::today() <= $train->fdate_conducted)
                                        <li class="timeline{{($j%2)? '-inverted':''}}">
                                            <div class="timeline-badge" style="background:{{'#'.dechex(rand(0x000000, 0xFFFFFF))}}"><i class="fa fa-random"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <img src="/storage/training_image/{{$train->training_image}}" alt="" width="250px" height="100px">
                                                    <p></p>
                                                    <h4 class="timeline-title">{{$train->training_name}} {!! (\Carbon\Carbon::today()==$train->fdate_conducted)? '<span class="btn btn-sm btn-success">On-Going</span>': (\Carbon\Carbon::today() > $train->fdate_conducted)? '<span class="btn btn-sm btn-info">Done</span>' : '' !!}</h4>
                                                    <p><h6 class="text-muted"><i class="fa fa-time"></i> {{date('F d, Y', strtotime($train->fdate_conducted))}}</h6></p>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>{!!$train->description!!}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @php($j++)
                                @endforeach --}}
                                @endforeach
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success"><small><i class="fa fa-map-marker"> START</i></small></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="side">
                        <h2>&emsp;</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="border:black;border-top: 5px solid green!important;background:rgb(34, 49, 63);color:white">
                                    <div class="card-header">
                                        <h4 class="card-title">Project Decription</h4>
                                    </div>
                                    <figure>
                                        <img width="450px" height="150px" src="/storage/project_image/{{$project->project_image}}" alt="">
                                    </figure>
                                    <div class="card-body">
                                        <p>{{$project->description}}</p>
                                    </div>
                                </div><br>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" style="border:black;border-top: 5px solid teal!important;background:rgb(34, 49, 63);color:white">
                                        <h4 class="card-title">Comments for {{$project->project_name}}</h4>
                                    </div>
                                    <div class="card-body" style="overflow:auto;">
                                        @foreach($comments as $comm)
                                                <div class="card">
                                                    <div class="card-body">
                                                        @include('Forums.reply-modal')
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <h5> <img style="width:25px;height:25px;" class="img img-circle" src="/storage/profile_images/{{$comm->profile_image}}"> {{$comm->firstname.' '.$comm->lastname}}</h5>
                                                                <small class="text-{{($comm->admin == 2 || $comm->admin == 1)? 'danger':'success'}}">({{($comm->admin == 2 || $comm->admin == 1)? 'Extension Staff':'Participant'}})</small>    
                                                            </div>
                                                            <div class="col-md-4">
                                                                <small><span><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($comm->date_time)->diffForHumans()}}</span></small>
                                                            </div>
                                                        </div>
                                                        <p>{{$comm->message}}</p>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <small><i class="fa fa-comment"> Replies: {{\App\commentdetails::where('comment_id',$comm->cid)->count()}}</i></small>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-6"></div>
                                                                    <div class="col-md-6">
                                                                        <a  href="" onclick="event.preventDefault();" data-toggle="modal" data-target="#myModalrep{{$comm->id}}"><small class="pull-right"><i class="fa fa-pencil"> Reply</i></small></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h5>Replies</h5>
                                                        @foreach(\App\commentdetails::where('comment_id',$comm->cid)->get() as $cd)
                                                            @foreach($users as $user)
                                                                @if($user->id == $cd->sender_id)
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <h6> 
                                                                                <img style="width:18px;height:18px;" class="img img-circle" src="/storage/profile_images/{{$user->profile_image}}">
                                                                                 {{$user->firstname.' '.$user->lastname}} 
                                                                                 <small class="text-{{($user->admin == 2 || $user->admin == 1)? 'danger':'success'}}">({{($user->admin == 2 || $user->admin == 1)? 'Extension Staff':'Participant'}})</small>
                                                                                 &emsp;<small><span><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($cd->date_time)->diffForHumans()}}</span></small>
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                    <small>{{$cd->reply}}</small>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <hr>
                                        @endforeach
                                    </div>
                                    <div class="card-footer" style="border:black;background:rgb(34, 49, 63);color:white">
                                        @if(Auth::check())
                                            {!! Form::open(['action'=>'ForumController@addcomment','method'=>'POST','id'=>'addcomment']) !!}
                                            {!! csrf_field() !!}
                                                <input type="text" name="proj_id" id="proj_id" class="hidden" value="{{$proj_id}}">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea type="text" class="form-control" name="comment" placeholder="Enter your Comment Here" id="comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row pull-right" style="padding-top:10px">
                                                    <div class="col-md-4">
                                                        <button class="btn btn-primary" onclick="document.getElementById('addcomment').submit();">Submit</button>
                                                    </div>
                                                </div>
                                            {!! Form::close() !!}
                                        @else
                                            <a href="/login" class="btn btn-sm btn-outline-success btn-circle">Login</a> to Comment
                                        @endif
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif <br><br><br>
@endsection
@section('scripts')
<script>
    $('#trainview').on('click', function(){
        $('#trainingsview').removeClass('hidden');
        $('#timeline').addClass('hidden');
        $('#trainview').removeClass('btn-primary');
        $('#trainview').addClass('btn-warning');
        $('#timeview').removeClass('btn-warning');
        $('#timeview').addClass('btn-primary');
    });
    $('#timeview').on('click', function(){
        $('#trainingsview').addClass('hidden');
        $('#timeline').removeClass('hidden');
        $('#timeview').removeClass('btn-primary');
        $('#timeview').addClass('btn-warning');
        $('#trainview').removeClass('btn-warning');
        $('#trainview').addClass('btn-primary');
    });
</script>
{{-- <script>
    $(this.id).click(function(e) {
    
    });
    function replytocom(input) {
        e. preventDefault();
        //setting variables based on the input fields
        var inputName = $('input[name="name"]').val();
        var inputDrink = $('input[name="drink"]').val();
        var token = $('input[name="_token"]').val();
        var data = {name:inputName, drink:inputDrink, token:token};

        var request = $.ajax({
            url: "index",
            type: "POST",
            data: data,
            dataType:"html"
            });
    }
</script> --}}
@endsection