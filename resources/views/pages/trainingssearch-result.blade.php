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
            <div class="row">
                <h4>Search result(s) for: {{$searched}}</h4>
            </div>
            <div class="row">
                @if(count($details)<=0)
                    <div class="col-md-8 text-center">
                        <h4>No Training Matched for {{$searched}}</h4>
                    </div>
                @else
                    @foreach($details as $result)
                        <div class="col-md-8">
                            <h4><img src="/storage/training_image/{{$result->training_image}}" width="50px" height="25px"><a href="" data-toggle="modal" data-target="#myModalPart{{$result->id}}">{{$result->training_name}}</a></h4>
                            <h6>{{$result->description}}</h6>
                            <small>Project: <a href="/projects/trainings/{{$result->proj_id}}">{{(\App\Projects::where('id',$result->proj_id)->value('project_name'))}}</a></small>
                            <hr>
                        </div>
                        @include('pages.participatemodal')
                    @endforeach
                @endif
            </div>
        </div><br>
    </section>
@endsection