@extends('layouts.app')

@section('content')
<br>
<a href="/posts" class="btn btn-info">Back</a>
    <div class="card">
        <div class="container">
                <h1>{{$post->title}}</h1>
                <hr>
                <img class="card" src="/storage/cover_images/{{$post->cover_image}}">
                <br>
                <div>
                        {!!$post->body!!}
                </div>
                <hr>
                <div class="form-inline">
                    <small>Created at: {{$post->created_at}} by {{$post->user->name}}</small> &nbsp;
                
                    @if(!Auth::guest())
                        @if(Auth::User()->id == $post->user_id)
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-info">Edit</a> &nbsp;
                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}                    
                                {{Form::submit('Delete', ['class'=>'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}
                        @endif
                    @endif
                </div>
        </div>
    </div>
@endsection