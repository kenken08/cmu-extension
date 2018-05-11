@extends('layouts.website')

@section('content')
<br>
    <section class="content bg-default padding padding-top padding-bottom">
        <div class="body">
            <ol class="breadcrumb bg-light col-md-12">
                <li class="breadcrumb-item">
                    <a class="text-secondary" href="/">Home</a>
                    <span class="text-muted">/ {!! $title !!}</span>
                </li>
            </ol>
        </div>  
        @include('website.partials.page_header')
        <div class="row">
            <div class="body col-sm-7 col-lg-8">
                <div class="card-body text-justify">
                    <div class="container border-left">
                        @foreach($about as $ab)
                            {!! $ab->about !!}
                        @endforeach
                    </div>
                </div>
            </div>
        
            <div class="side hidden-xs col-sm-5 col-lg-4">
                <div class="box">
                    <div class="card text-center border-warning" style="margin-top:10px; margin-bottom:50px"> 
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

