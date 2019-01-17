@extends('layouts.website')

@section('content')
<div class="body">
    <ol class="breadcrumb">
        <div class="container">
            <li class="breadcrumb-item">
                <a class="text-secondary" href="">Home /</a>
                <span class="text-muted">{!! $title !!}</span>
            </li>
        </div>
    </ol>
</div>
    <section class="content p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container"> @include('website.partials.page_header')</div>
                    <div class="container">
                        <div class="pagination-box">
                            <div class="row">
                                @foreach($galleries as $gallery)
                                    <div class="col-md-4">
                                        <div class="gallery">
                                            <figure>
                                                <a href="" title="{{ $gallery->category }}">
                                                    <img src="/storage/gal_photo/{{$gallery->gal_photo}}" width="210px" height="150px">
                                                </a>
                                            </figure>
                                            <h4>{!! $gallery->category !!}</h4>
                                            <p>
                                                <a href="/gallery/{{$gallery->id}}/view" class="btn btn-primary btn-block">View gallery</a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{ $galleries->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                <div class="side hidden-xs col-sm-5 col-lg-4">
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
                                        @foreach($galleries as $item)
                                            <li><a href="">{!! $item->category !!}</a></li>
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

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            // paginator
            new PaginationClass();
        })
    </script>
@endsection