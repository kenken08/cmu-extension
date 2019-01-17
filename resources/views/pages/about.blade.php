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
<section id="about">
    @include('website.partials.page_header')
    <div class="row">
        <div class="body col-sm-7 col-lg-12">
            <div class="card-body text-justify">
                <div class="container border-left">
                    @foreach($about as $ab)
                        {!! $ab->about !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

