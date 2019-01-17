@extends('layouts.app')

@section('content')
<br>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form form-group">
            <div class="card card-header bg-dark border-bottom-0">
                    <strong class="text text-lg-left text-light">Edit Post</strong>
            </div>
            <div class="card card-body">
                <div class="form-inline">
                    {{Form::hidden('_method', 'PUT')}}                    
                    {{Form::submit('Save Changes', ['class'=>'btn btn-info'])}} &nbsp;
                    {{Form::file('cover_image', ['class'=>'btn btn-sm btn-outline-info'])}}
                </div>          
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title',$post->title, ['class'=>'form-control', 'placeholder'=>'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body',$post->body, ['id'=>'article-ckeditor','class'=>'form-control border-success', 'placeholder'=>'Body Text'])}}
            </div>
        </div>
    {!! Form::close() !!}
@endsection 