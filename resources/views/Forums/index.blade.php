@extends('layouts.website')
@section('content')
<section class="content p-3">
    
        <div class="body">
            <ol class="breadcrumb bg-light col-md-12">
                <li class="breadcrumb-item">
                    <a class="text-secondary" href="/">Home</a>
                    <span class="text-muted">/ {!! $title !!}</span>
                </li>
            </ol>
        </div>
        @if(count($projects) <= 0)
            <div class="text-center container animated fadeInLeft">
                <div class="row justify-text-center">
                    <div class="col-md-12">
                        <div class="card" style="width:400px;height:200px">
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
            <div class="container"> @include('website.partials.page_header')</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @foreach($projects as $proj)
                            <div class="card">
                                <div class="body" style="height: 185px;border-radius:10px">
                                    <div class="row d-block">
                                        <div class="col-sm-4 float-right col-sm-12 text-center">
                                            <figure>
                                                <a href="/storage/profile_images/banner/banner-3.jpg" data-fancybox="gallery">
                                                    <img class="img img-fluid mb-3" src="/storage/profile_images/banner/banner-3.jpg" style="margin:auto;">
                                                </a>
                                                <figcaption class="black1"><button style="margin-top:-3px" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye">View Project</i></button></figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                @foreach($objectives as $object)
                                    @if($object->proj_id ==  $proj->id)
                                        <div class="progress" style="height:20px; margin-top:-1px">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" aria-valuemax="100" style="width:{{ days($proj->date_conducted, $proj->to_date) + $object->total }}%"><small>{{ days($proj->date_conducted, $proj->to_date) + $object->total }}%</small></div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-5" style="margin-top:-170px; margin-left:-15px">
                                    <div class="card black1" style="border:black;border-right: 5px solid #43ac6a!important;">
                                        <h4 class="text-white text-center" style="margin-top:7px">&nbsp;{{$proj->project_name}}</h4>
                                    </div>
                                </div>
                                <div class="card-footer text-right" style="margin-top:126px;">
                                    <div class="row">
                                        <div class="col-md-12 pull-right"><small><strong>{{ datec($proj->date_conducted, $proj->to_date) }}</strong></small></div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                    <div class="side d-sm-block col-sm-8 col-lg-4">
                        <div class="card">
                            <div class="card-body bg-navy-active">
                                <h4 class="header">Projects Links</h4>
                                @foreach($projects as $item)
                                    @foreach($objectives as $ob)
                                        @if($ob->proj_id==$item->id)
                                            <a href="">
                                                <div class="row">
                                                    <div class="form-group col-md-12 animated flipInX">
                                                        <div class="col-12" style="margin-left:-35px">
                                                            <div class="card black1" style="border:black;border-right: 5px solid #43ac6a!important;">
                                                                <a class="text-white" href="" style="margin-left:10px; margin-top:8.5px" data-toggle="tooltip" title="View Project {!! $item->project_name !!}">
                                                                    <label style="margin-left:10px;margin-top:3px" class="btn-xs">{!! $item->project_name !!}</label>
                                                                    <label style="margin-right:5px" class="btn btn-sm btn-outline-success pull-right">{{days($item->date_conducted, $item->to_date) + $ob->total}}%</label>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="container text-right pagination-sm">{{$projects->links()}}</div>
</section>
@endsection