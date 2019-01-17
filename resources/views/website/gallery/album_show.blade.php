@extends('layouts.website')

@section('content')
<div class="body">
    <ol class="breadcrumb">
        <div class="container">
            <li class="breadcrumb-item">
                <a class="text-secondary" href="/">Home /</a>
                <a class="text-secondary" href="/gallery">Gallery /</a>                
                <span class="text-muted">{!! $category->category !!}</span>
            </li>
        </div>
    </ol>
</div>
    <section class="content p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container">@include('website.partials.page_header')</div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{!! $category->category !!}</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($galler as $gal)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="/storage/cover_images/{{$gal->image}}" data-fancybox="gallery">
                                                    <img class="img" src="/storage/cover_images/{{$gal->image}}" width="150px" height="150px">
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>{{$gal->description}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $galler->links('pagination::bootstrap-4') }}
                </div>
                <div class="side col-md-4">
                    <div class="box">
                        <div class="card" style="background-image:url('/storage/profile_images/banner/about.png');margin-top:50px; margin-bottom:50px; margin-right:15px"> 
                            <div class="box">
                                <div class="text-center animated flipInY">
                                    <img src="/images/cmu.png" class="img img-circle" alt="Contact" style="width:110px; height:110px;margin-top:-50px;">
                                </div>
                                <div class="card-body text-center animated flipInX">
                                    <strong>Central Mindanao University</strong>
                                    <h4>Extension Office</h4>
                                </div>
                                <div class="container text-left">
                                    <h2 class="side-heading">Gallery Links:</h2>
                                    <ul>
                                        @foreach($galler as $item)
                                            <li><a href="">{!! $item->name !!}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
