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
    <section style="background:url('/storage/profile_images/banner/about.jpg/');background-repeat:no-repeat;height:300px;margin-top:-15px;">
        <div class="text-center" style="padding-top:5%">
            <div class="row features">
                <div class="col-sm-12">
                    <h2 class="text-center">
                        <span class="heading_border bg-gween">Welcome to Extension Office Trainings</span>
                    </h2><br>
                    <h5>
                        Extension Office offers trainings for farmers, associations, organizations and etc.
                    </h5>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="container"><br><br>
                <div class="col-md-12">
                    <form action="{{route('search-training')}}" method="POST" id='search-training'> @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="" placeholder="Search for Trainings..." autofocus>
                            <a href="" onclick="document.getElementById('search-training').submit()" class="input-group-append"><span class="input-group-text"><i class="fa fa-search"></i>Search</span></a>
                        </div>
                        {!! form_error_message('search', $errors) !!}
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container"><br><br>
            @foreach(\App\Trainings::all() as $k => $item)
                {{-- <div class="news carousel-item {{ $k == 0? 'active':'' }}">
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
                            <h5 class="media-heading text-primary">{!! $item->training_name !!}</h5>
                            <div class="text limit">
                                <p>{{$item->description}}</p>
                            </div>
                            <p><i class="fa fa-map-marker"></i> Venue: {{$item->venue}}</p>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-8">
                    <h4>
                        <img src="/storage/training_image/{{$item->training_image}}" width="50px" height="20px">
                        <a href="" data-toggle="modal" data-target="#myModalPart{{$item->id}}">{{$item->training_name}}</a>
                    </h4>
                    <h6>{{$item->description}}</h6>
                    <small>Project: <a href="/projects/trainings/{{$item->proj_id}}">{{(\App\Projects::where('id',$item->proj_id)->value('project_name'))}}</a></small>
                    <hr>
                </div>
                @include('pages.participatemodal')
            @endforeach
        </div><br>
    </section>
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
@endsection