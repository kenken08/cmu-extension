@extends('layouts.app')

@section('content') 
    <div class="form form-group">
        <br>
        <div class="card card-header card-title text-light bg-dark"><h4>Posts</h4></div>

            <div class="card card-body">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="card">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-1 col-sm-1">
                                        <img class="card img img-thumbnail" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <strong><h2><a class="text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a></h2></strong>
                                        <footer class"text-sm">Created at: {{$post->created_at}} by {{$post->user->name}}</footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                    @endforeach
                    <footer class="card-footer card-header-pills">{{$posts->links()}}</footer>
                @else
                    <p>No posts found</p>
                @endif
            </div>         
    </div>
@endsection