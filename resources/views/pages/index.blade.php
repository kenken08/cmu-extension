@extends('layouts.website')

@section('content')  
    <div class="row">
        <div class="col-md-8">
            <div class="container">
                <section><br>
                    <div class="row">
                        <div class="col-md-12">
                            <aside class="card bg-light mt-3">
                                <div class="card-body">
                                    <h2 class="side-heading">Today's Training(s)</h2>
                                    <div id="news-carousel" class="carousel slide side-news" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($today as $k => $item)
                                                <div class="news carousel-item {{ $k == 0? 'active':'' }}">
                                                    <figure>
                                                        <a href="#">
                                                            <img src="/storage/training_image/{{$item->training_image}}" height="300px">
                                                        </a>
                                                    </figure>
                                                    <div class="media mt-2">
                                                        <div class="media-left mr-2">
                                                            <div class="date bg-warning">
                                                                {!! date('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y',strtotime($item->fdate)) !!}
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading text-primary">{!! $item->training_name !!} at {{$item->venue}}</h4>
                                                            <div class="text limit">
                                                                <p>{{$item->description}}</p>
                                                            </div>
                                                            <p><i class="fa fa-map-marker"></i> Venue: {{$item->venue}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach(\App\Trainings::where('fdate_conducted',\Carbon\Carbon::today())->get() as $k => $item)
                                                <div class="news carousel-item {{ $k == 0? 'active':'' }}">
                                                    <figure>
                                                        <a href="#">
                                                            <img src="/storage/training_image/{{$item->training_image}}" height="300px">
                                                        </a>
                                                    </figure>
                                                    <div class="media mt-2">
                                                        <div class="media-left mr-2">
                                                            <div class="date bg-warning">
                                                                {!! date('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y',strtotime($item->fdate_conducted)) !!}
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading text-primary">{!! $item->training_name !!}</h4>
                                                            <div class="text limit">
                                                                <p>{{$item->description}}</p>
                                                            </div>
                                                            <p><i class="fa fa-map-marker"></i> Venue: {{$item->venue}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#news-carousel" role="button" data-slide="prev">
                                            <span class="fa fa-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#news-carousel" role="button" data-slide="next">
                                            <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div><br>
                </section>
                <section id="about" style="background:url('/storage/profile_images/banner/about.jpg');background-repeat:no-repeat;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center" style="padding-top:5%">
                                <h2 class="card-title">
                                    <span class="heading_border bg-gween">About Us</span>
                                </h2>
                                <div class="card-body" style="padding:-20px">
                                    <p>The <strong>University Extension</strong> is responsible in bringing about desirable changes among people in its service area. The office has continued implementing various<br> programs and projects as tangible evidence of its continued support to the university’s goals which is to provide technical expertise to the clienteles.<br>
                                    The office has established <strong>Agrarian Reform Communities (ARCs)</strong>, implemented relevant extension projects, promoted agricultural technologies and conducted <br>various trainings based on needs of the participants, served many farmers and homemakers, and developed and produced various Information, <br>Education and Communication (IEC) materials.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-light" style="background:url('/storage/profile_images/banner/7430.jpg');">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center" style="padding-top:5%">
                                <h2 class="card-title">
                                    <span class="heading_border bg-gween">Extension Units</span>
                                </h2>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="box1 animated fadeInLeft">
                                                <div class="box-icon text-center"  style="background-color:white">
                                                    <h5 class="text-success" style="margin-top:26px">CBU</h5>
                                                </div>
                                                <div class="body text-left">
                                                    <div class="container">
                                                        <p class="text-justify">The University Extension is responsible in bringing about desirable changes among people in its service area. The office has continued implementing various programs and projects as tangible evidence of </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    
                                        <div class="col-md-4">
                                            <div class="box1 animated fadeIn">
                                                <div class="box-icon text-center"  style="background-color:white">
                                                    <h5 class="text-yellow" style="margin-top:26px">ICU</h5>
                                                </div>
                                                <div class="body text-left">
                                                    <div class="container">
                                                        <p class="text-justify">The University Extension is responsible in bringing about desirable changes among people in its service area. The office has continued implementing various programs and projects as tangible evidence of </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                        
                                        <div class="col-md-4">
                                            <div class="box1 animated fadeInRight">
                                                <div class="box-icon text-center"  style="background-color:white">
                                                    <h5 class="text-purple" style="margin-top:26px">TDSU</h5>
                                                </div>
                                                <div class="body text-left">
                                                    <div class="container">
                                                        <p class="text-justify">The University Extension is responsible in bringing about desirable changes among people in its service area. The office has continued implementing various programs and projects as tangible evidence of </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="col-md-4"><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <aside class="card bg-light mt-3">
                            <div class="card-body">
                                <h2 class="side-heading">Upcoming Training(s)</h2>
                    
                                <div id="news-carousel-2" class="carousel slide side-news" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @foreach($upcoming as $k => $item)
                                            <div class="news carousel-item {{ $k == 0? 'active':'' }}">
                                                <figure>
                                                    <a href=""  data-toggle="modal" data-target="#myModalPart{{$item->id}}">
                                                        <img src="/storage/training_image/{{$item->training_image}}">
                                                    </a>
                                                </figure>
                                                <div class="media mt-2">
                                                    <div class="media-left mr-2">
                                                        <div class="date bg-warning">
                                                            {!! date('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y',strtotime($item->fdate)) !!}
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading text-primary">
                                                            <a href="" data-toggle="modal" data-target="#myModalPart{{$item->id}}">{!! $item->training_name !!}</a>
                                                        </h5>
                                                        <div class="text limit">
                                                            <p>{{$item->description}}</p>
                                                        </div>
                                                        <p><i class="fa fa-map-marker"></i> Venue: {{$item->venue}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('pages.participatemodal')
                                        @endforeach
                                        @foreach(\App\Trainings::where('fdate_conducted','>',\Carbon\Carbon::today())->get() as $k => $item)
                                            <div class="news carousel-item {{ $k == 0? 'active':'' }}">
                                                <figure>
                                                    <a href="" data-toggle="modal" data-target="#myModalPart{{$item->id}}">
                                                        <img src="/storage/training_image/{{$item->training_image}}">
                                                    </a>
                                                </figure>
                                                <div class="media mt-2">
                                                    <div class="media-left mr-2">
                                                        <div class="date bg-warning">
                                                            {!! date('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y',strtotime($item->fdate_conducted)) !!}
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading text-primary">
                                                            <a href="" data-toggle="modal" data-target="#myModalPart{{$item->id}}">{!! $item->training_name !!}</a>
                                                        </h5>
                                                        <div class="text limit">
                                                            <p>{{$item->description}}</p>
                                                        </div>
                                                        <p><i class="fa fa-map-marker"></i> Venue: {{$item->venue}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('pages.participatemodal')
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#news-carousel-2" role="button" data-slide="prev">
                                        <span class="fa fa-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#news-carousel-2" role="button" data-slide="next">
                                        <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-12">
                        <aside class="card bg-light mt-3">
                            <div class="card-body">
                                <h2 class="side-heading">Announcement(s)</h2>
                    
                                <div id="news-carousel-3" class="carousel slide side-news" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @foreach($announce as $k => $item)
                                            @if(\Carbon\Carbon::today() <= format_date('Y-M-d h:m:s',$item->expires_at))
                                                <div class="news carousel-item {{ $k == 0? 'active':'' }}">
                                                    <figure>
                                                        <a href="#">
                                                            <img src="/storage/ann_photo/{{$item->ann_photo}}">
                                                        </a>
                                                    </figure>
                                                    <div class="media mt-2">
                                                        <div class="media-left mr-2">
                                                            <div class="date bg-danger">
                                                                {!! date('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y',strtotime(\Carbon\Carbon::today())) !!}
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading text-primary">{{$item->announcement_title}}</h4>
                                                            <div class="text limit">
                                                                <p>{{$item->description}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#news-carousel-3" role="button" data-slide="prev">
                                                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#news-carousel-3" role="button" data-slide="next">
                                                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-12">
                        <aside class="card bg-light mt-3">
                            <div class="card-body">
                                <h2 class="side-heading">New Added Projects</h2>
                    
                                <div id="news-carousel" class="carousel slide side-news" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <ul>
                                            @foreach(\App\Projects::where('stat','inprogress')->orderBy('created_at','ASC')->take(3)->get() as $project)
                                                <li>
                                                    @foreach(\App\User::where('id',$project->user_id)->get() as $user)
                                                        <img class="img img-circle" src="/storage/profile_images/{{$user->profile_image}}" alt="" width="30px" height="30px">
                                                    @endforeach
                                                    &emsp;{{$project->project_name}}&emsp; <a class="pull-right" href="/projects/trainings/{{$project->id}}">View</a>
                                                </li><hr>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-12">
                        <aside class="card bg-light mt-3">
                            <div class="card-body">
                                <h2 class="side-heading">Archive Projects</h2>
                    
                                <div id="news-carousel" class="carousel slide side-news" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <ul>
                                            @foreach(\App\Projects::where('stat','completed')->orderBy('created_at','ASC')->take(3)->get() as $project)
                                                <li>
                                                    @foreach(\App\User::where('id',$project->user_id)->get() as $user)
                                                        <img class="img img-circle" src="/storage/profile_images/{{$user->profile_image}}" alt="" width="30px" height="30px">
                                                    @endforeach
                                                    &emsp;{{$project->project_name}}&emsp; <a class="pull-right" href="/projects/trainings/{{$project->id}}">View</a>
                                                </li><hr>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <section id="contact" style="background-color: rgb(34, 49, 63);">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h2 class="text-center">
                    <span class="heading_border bg-gween">Contact</span>
                </h2>
                <p class="section-description text-white">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
        </div>
        <!-- <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div> -->
    
        <div class="container wow fadeInUp">
            <div class="row justify-content-center">
    
            <div class="col-lg-3 col-md-4">
                <div class="info">
                <div class="text-white">
                    <i class="fa fa-map-marker"></i>
                    <p>P-12, College Park, Musuan<br>Philippines, Region 10</p>
                </div>
    
                <div class="text-white">
                    <i class="fa fa-envelope"></i>
                    <p>info@extensionoffice.com</p>
                </div>
    
                <div class="text-white">
                    <i class="fa fa-phone"></i>
                    <p>+639067578290</p>
                </div>
                </div>
            </div>
    
            <div class="col-lg-5 col-md-8">
                <div class="form">
                {{-- <div id="sendmessage">Your message has been sent. Thank you!</div> --}}
                <div id="errormessage"></div>
                {!! Form::open(['action' => 'MessageController@send', 'method' => 'POST'])!!}
                {!! csrf_field() !!}
                @if(Auth::check())
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{user()->firstname.' '.user()->lastname}}" readonly/>
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value="{{user()->email}}" readonly/>
                    <div class="validation"></div>
                    </div>
                @else
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value=""/>
                    <div class="validation"></div>
                    </div>
                @endif

                    <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                    </div>
                
                    <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection