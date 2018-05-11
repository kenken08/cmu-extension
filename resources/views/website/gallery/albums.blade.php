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
                

                <div class="pagination-box">
                    <div class="row">
                        @foreach($galleries as $gallery)
                            <div class="col-sm-4">
                                <div class="gallery">
                                    <figure>
                                        <a href="" title="{{ $gallery->category }}">
                                            <img src="/images/cmulogob1.png">
                                        </a>
                                    </figure>
                                    <h2>{!! $gallery->category !!}</h2>
                                    <p>
                                        <a href="" class="btn btn-primary btn-block">
                                            View gallery
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $galleries->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <div class="side d-none d-sm-block col-sm-5 col-lg-4">
                <div class="card bg-light">
                    <div class="card-body">
                        <h2 class="side-heading">Links for Galleries</h2>
                        <ul>
                            @foreach($galleries as $item)
                                <li><a href="">{!! $item->category !!}</a></li>
                            @endforeach
                        </ul>
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