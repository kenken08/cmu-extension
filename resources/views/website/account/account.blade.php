@extends('layouts.website')

@section('content')
    <section class="content p-3">
        <div class="row mt-5s">
            <div class="col-sm-8">
                <h1 class="page-header text-dark">
                    {!! isset($title) ? $title : $title !!}
                </h1>
            </div>
        </div>                
        <div class="row">
            <div class="body col-sm-7 col-lg-8">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item">
                        <a class="text-secondary" href="">Home /</a>
                        <span class="text-muted">{!! $title !!}</span>
                    </li>
                </ol>
                <h2>{!!user()->firstname.' '.user()->lastname!!}</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <p>
                                    <a href="">
                                        <img style="width:50px; height: 50px" class="img-circle" src="/storage/profile_images/{{user()->profile_image}}" alt="">
                                        My Profile
                                    </a>
                                </p>
                                <p><i class="fa fa-user"></i> Name: {!! user()->firstname.' '.user()->lastname !!}</p>
                                <p><i class="fa fa-envelope"></i> E-mail: {!! user()->email !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <div class="side hidden-xs col-sm-5 col-lg-4">
                <div class="box">
                    <div class="card text-center border-warning" style="margin-top:50px; margin-bottom:50px"> 
                        <div class="box">
                            <div class="text-center animated flipInY">
                                <img src="/images/cmu.png" class="img img-circle" alt="Contact" style="width:110px; height:110px;margin-top:-50px;">
                            </div>
                            <div class="card-body text-center animated flipInX">
                                <p>Central Mindanao University</p>
                                <h4>Extension Office</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
